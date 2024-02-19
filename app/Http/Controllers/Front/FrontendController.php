<?php

namespace App\Http\Controllers\Front;

use App\Event;
use App\EventCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Language;
use App\Package;
use App\PackageOrder;
use App\Admin;
use App\PaymentGateway;
use App\Pcategory;
use App\Subscription;
use App\Product;
use Session;
use Validator;
use Config;
use Mail;
use PDF;
use Auth;


class FrontendController extends Controller
{

    public function index(Request $request)
    {

        $data['categories'] = Pcategory::where('status', 1)->get();

        $search = $request->search;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $category = $request->category_id;
        $tag = $request->tag;

        if ($request->type) {
            $type = $request->type;
        } else {
            $type = 'new';
        }
        $tag = $request->tag;
        $review = $request->review;

        $data['products'] =
            Product::when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($search, function ($query, $search) {
                return $query->where('title', 'like', '%' . $search . '%');
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('current_price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('current_price', '<=', $maxprice);
            })
            ->when($tag, function ($query, $tag) {
                return $query->where('tags', 'like', '%' . $tag . '%');
            })
            ->when($review, function ($query, $review) {
                return $query->where('rating', '>=', $review);
            })
            ->when($type, function ($query, $type) {
                if ($type == 'new') {
                    return $query->orderBy('id', 'DESC');
                } elseif ($type == 'old') {
                    return $query->orderBy('id', 'ASC');
                } elseif ($type == 'high-to-low') {
                    return $query->orderBy('current_price', 'DESC');
                } elseif ($type == 'low-to-high') {
                    return $query->orderBy('current_price', 'ASC');
                }
            })

            ->where('status', 1)->paginate(9);

        return view('frontend.index', $data);
    }

    
    public function paymentInstruction(Request $request)
    {
        $offline = OfflineGateway::where('name', $request->name)->select('short_description', 'instructions', 'is_receipt')->first();
        return response()->json(['description' => $offline->short_description, 'instructions' => replaceBaseUrl($offline->instructions), 'is_receipt' => $offline->is_receipt]);
    }
    public function events(Request $request)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $data['bex'] = $currentLang->basic_extra;
        $data['currentLang'] = $currentLang;
        $be = $currentLang->basic_extended;
        $data['bs'] = $currentLang->basic_setting;
        $data['event_categories'] = EventCategory::where('status', 1)->select('id', 'name')->get();
        $data['events'] = Event::with('eventCategories')
            ->when($request->title, function ($q) use ($request) {
                return $q->where('title', 'like', '%' . $request->title . '%');
            })->when($request->location, function ($q) use ($request) {
                return $q->where('venue_location', 'like', '%' . $request->location . '%');
            })->when($request->category, function ($q) use ($request) {
                return $q->where('cat_id', $request->category);
            })->when($request->date, function ($q) use ($request) {
                return $q->where('date', $request->date);
            })
            ->orderBy('id', 'DESC')
            ->paginate(6);
        $version = $be->theme_version;

        if ($version == 'dark') {
            $version = 'default';
        }

        $data['version'] = $version;
        return view('front.events', $data);
    }
    public function eventDetails($slug)
    {
        $event = Event::with('eventCategories')->where('slug', $slug)->firstOrFail();
        $data['event'] = $event;
        $online = PaymentGateway::where('status', 1)->get();
        $data['payment_gateways'] = $online;

        $stripeData = PaymentGateway::whereKeyword('stripe')->first();
        $stripe = $stripeData->convertAutoData();
        $data['stripe_key'] =  $stripe['key'];
        return view('frontend.event-details', $data);
    }

    public function sendmail(Request $request)
    {
        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }
        $bs = $currentLang->basic_setting;

        $messages = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
        if ($bs->is_recaptcha == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $request->validate($rules, $messages);

        $request->validate($rules, $messages);

        $be =  BE::firstOrFail();
        $from = $request->email;
        $to = $be->to_mail;
        $subject = $request->subject;
        $message = $request->message;

        try {

            $mail = new PHPMailer(true);
            $mail->setFrom($from, $request->name);
            $mail->addAddress($to);     // Add a recipient

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            $mail->send();
        } catch (\Exception $e) {
            // die($e->getMessage());
        }

        Session::flash('success', 'Email sent successfully!');
        return back();
    }

 

    public function submitorder(Request $request)
    {

        if (session()->has('lang')) {
            $currentLang = Language::where('code', session()->get('lang'))->first();
        } else {
            $currentLang = Language::where('is_default', 1)->first();
        }

        $bs = $currentLang->basic_setting;
        $be = $currentLang->basic_extended;
        $package_inputs = $currentLang->package_inputs;

        $messages = [
            'g-recaptcha-response.required' => 'Please verify that you are not a robot.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
        ];

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'package_id' => 'required'
        ];

        $allowedExts = array('zip');
        foreach ($package_inputs as $input) {
            if ($input->required == 1) {
                $rules["$input->name"][] = 'required';
            }
            // check if input type is 5, then check for zip extension
            if ($input->type == 5) {
                $rules["$input->name"][] = function ($attribute, $value, $fail) use ($request, $input, $allowedExts) {
                    if ($request->hasFile("$input->name")) {
                        $ext = $request->file("$input->name")->getClientOriginalExtension();
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only zip file is allowed");
                        }
                    }
                };
            }
        }

        if ($bs->is_recaptcha == 1) {
            $rules['g-recaptcha-response'] = 'required|captcha';
        }

        $request->validate($rules, $messages);

        $fields = [];
        foreach ($package_inputs as $key => $input) {
            $in_name = $input->name;
            // if the input is file, then move it to 'files' folder
            if ($input->type == 5) {
                if ($request->hasFile("$in_name")) {
                    $fileName = uniqid() . '.' . $request->file("$in_name")->getClientOriginalExtension();
                    $directory = 'assets/frontend/files/';
                    @mkdir($directory, 0775, true);
                    $request->file("$in_name")->move($directory, $fileName);

                    $fields["$in_name"]['value'] = $fileName;
                    $fields["$in_name"]['type'] = $input->type;
                }
            } else {
                if ($request["$in_name"]) {
                    $fields["$in_name"]['value'] = $request["$in_name"];
                    $fields["$in_name"]['type'] = $input->type;
                }
            }
        }
        $jsonfields = json_encode($fields);
        $jsonfields = str_replace("\/", "/", $jsonfields);

        $package = Package::findOrFail($request->package_id);

        $in = $request->all();
        $in['name'] = $request->name;
        $in['email'] = $request->email;
        $in['fields'] = $jsonfields;

        $in['package_title'] = $package->title;
        $in['package_currency'] = $package->currency;
        $in['package_price'] = $package->price;
        $in['package_description'] = $package->description;
        $fileName = \Str::random(4) . time() . '.pdf';
        $in['invoice'] = $fileName;
        $po = PackageOrder::create($in);


        // saving order number
        $po->order_number = $po->id + 1000000000;
        $po->save();


        // sending datas to view to make invoice PDF
        $fields = json_decode($po->fields, true);
        $data['packageOrder'] = $po;
        $data['fields'] = $fields;


        // generate pdf from view using dynamic datas
        PDF::loadView('pdf.package', $data)->save('assets/frontend/invoices/' . $fileName);


        // Send Mail to Buyer
        $mail = new PHPMailer(true);

        if ($be->is_smtp == 1) {
            try {
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = $be->smtp_host;                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = $be->smtp_username;                     // SMTP username
                $mail->Password   = $be->smtp_password;                               // SMTP password
                $mail->SMTPSecure = $be->encryption;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = $be->smtp_port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($request->email, $request->name);     // Add a recipient

                // Attachments
                $mail->addAttachment('assets/frontend/invoices/' . $fileName);         // Add attachments

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Order placed for " . $package->title;
                $mail->Body    = 'Hello <strong>' . $request->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                $mail->send();
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        } else {
            try {

                //Recipients
                $mail->setFrom($be->from_mail, $be->from_name);
                $mail->addAddress($request->email, $request->name);     // Add a recipient

                // Attachments
                $mail->addAttachment('assets/frontend/invoices/' . $fileName);         // Add attachments

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Order placed for " . $package->title;
                $mail->Body    = 'Hello <strong>' . $request->name . '</strong>,<br/>Your order has been placed successfully. We have attached an invoice in this mail.<br/>Thank you.';

                $mail->send();
            } catch (Exception $e) {
                // die($e->getMessage());
            }
        }

        // send mail to Admin
        try {

            $mail = new PHPMailer(true);
            $mail->setFrom($po->email, $po->name);
            $mail->addAddress($be->from_mail);     // Add a recipient

            // Attachments
            $mail->addAttachment('assets/frontend/invoices/' . $fileName);         // Add attachments

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = "Order placed for " . $package->title;
            $mail->Body    = 'A new order has been placed.<br/><strong>Order Number: </strong>' . $po->order_number;

            $mail->send();
        } catch (\Exception $e) {
            // die($e->getMessage());
        }

        Session::flash('success', 'Order placed successfully!');
        return redirect()->route('front.packageorder.confirmation', [$package->id, $po->id]);
    }


    public function orderConfirmation($packageid, $packageOrderId)
    {
        $data['package'] = Package::findOrFail($packageid);
        $bex = BasicExtra::first();

        if ($bex->recurring_billing == 1) {
            $packageOrder = Subscription::findOrFail($packageOrderId);
        } else {
            $packageOrder = PackageOrder::findOrFail($packageOrderId);
        }

        $data['packageOrder'] = $packageOrder;
        $data['fields'] = json_decode($packageOrder->fields, true);

        $be = be::first();
        $version = $be->theme_version;

        if ($version == 'dark') {
            $version = 'default';
        }

        $data['version'] = $version;

        if ($bex->recurring_billing == 1) {
            return view('front.subscription-confirmation', $data);
        } else {
            return view('front.order-confirmation', $data);
        }
    }

    public function loadpayment($slug, $id)
    {
        $data['payment'] = $slug;
        $data['pay_id'] = $id;
        $gateway = '';
        if ($data['pay_id'] != 0 && $data['payment'] != "offline") {
            $gateway = PaymentGateway::findOrFail($data['pay_id']);
        } else {
            $gateway = OfflineGateway::findOrFail($data['pay_id']);
        }
        $data['gateway'] = $gateway;

        return view('front.load.payment', $data);
    }    // Redirect To Checkout Page If Payment is Cancelled



    // Redirect To Success Page If Payment is Comleted

    public function payreturn($packageid)
    {
        return redirect()->route('front.packageorder.index', $packageid)->with('success', __('Pament Compelted!'));
    }
}
