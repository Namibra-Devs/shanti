<?php


namespace App\Http\Controllers\Front;

use App\BasicSetting;
use App\Event;
use App\EventDetail;
use App\Language;
use App\OfflineGateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Payment\causes\FlutterWaveController;
use App\Http\Controllers\Payment\causes\InstamojoController;
use App\Http\Controllers\Payment\causes\MercadopagoController;
use App\Http\Controllers\Payment\causes\MollieController;
use App\Http\Controllers\Payment\causes\PaypalController;
use App\Http\Controllers\Payment\causes\PaystackController;
use App\Http\Controllers\Payment\causes\PaytmController;
use App\Http\Controllers\Payment\causes\PayumoneyController;
use App\Http\Controllers\Payment\causes\RazorpayController;
use App\Http\Controllers\Payment\causes\StripeController;
use App\Http\Helpers\KreativMailer;
use Illuminate\Support\Facades\Auth;
use PDF;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function makePayment(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        if ($event->available_tickets < $request->ticket_quantity) {
            if ($event->available_tickets == 0 || $event->available_tickets < 0) {
                $request->session()->flash('error', 'No Tickets Available');
            } else {
                $request->session()->flash('error', 'Only ' . $event->available_tickets . ' Tickets Available');
            }
            return back();
        }

        // if (!Auth::check()) {
        //     return redirect()->route('user.login', ['redirected' => 'event']);
        // }
        if ($request->payment_method == "0") {
            return redirect()->back()->with('error', 'Choose a payment method')->withInput();
        }

        Session::put('paymentFor', 'Event');
        $title = "You are purchasing an event ticket";
        $description = "Congratulation you are going to join our event.Please make a payment for confirming your ticket now!";
 
        // Payment with paystack
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email',
                'event_id' => 'required',
                'ticket_quantity' => 'required',
                'total_cost' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput();
            }
            $amount = $request->total_cost; //the amount in kobo. This value is actually NGN 300
            $email = $request->email;
            $request['status'] = "Success";
            $request['receipt_name'] = null;
            $success_url = route('donation.paystack.success');
            $payStack = new PaystackController;
            return $payStack->paymentProcess($request, $amount, $email, $success_url);
    }
    public function store($request, $transaction_id, $transaction_details, $amount)
    {
        $event_details = EventDetail::create([
            'user_id' => Auth::check() ? Auth::user()->id : NULL,
            'name' => $request["name"],
            'email' => $request["email"],
            'phone' => $request["phone"],
            'amount' => $amount,
            'quantity' => $request["ticket_quantity"],
            'currency' => "GHS",
            'currency_symbol' => '₵',
            'payment_method' => $request["payment_method"],
            'transaction_id' => uniqid(),
            'status' => $request["status"] ? $request["status"] : "success",
            'receipt' => $request["receipt_name"] ? $request["receipt_name"] : null,
            'transaction_details' => $transaction_details ? $transaction_details : null,
            'event_id' => $request["event_id"],
        ]);
        $event = Event::query()->findOrFail($request["event_id"]);
        $event->available_tickets = $event->available_tickets - $request["ticket_quantity"];
        $event->save();
        return $event_details;
    }
    public function makeInvoice($event)
    {
        Session::put('event_details_id', $event->id);
        $file_name = "Event#" . $event->transaction_id . ".pdf";
        $event->invoice = $file_name;
        $event->save();
        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,
            'logOutputFile' => storage_path('logs/log.htm'),
            'tempDir' => storage_path('logs/')
        ])->loadView('pdf.event', compact('event'));
        $output = $pdf->output();
        file_put_contents('assets/frontend/invoices/' . $file_name, $output);
        return $file_name;
    }

    public function sendMailPHPMailer($request, $file_name)
    {
        $eventDetailsId = Session::get('event_details_id');
        $eventDetails = EventDetail::findOrFail($eventDetailsId);
        $event = Event::findOrFail($request["event_id"]);

        $mailer = new KreativMailer;
        $data = [
            'toMail' => $request["email"],
            'toName' => $request["name"],
            'attachment' => $file_name,
            'customer_name' => $request["name"],
            'event_name' => $event->title,
            'ticket_id' => $eventDetails->transaction_id,
            'order_link' => Auth::check() ? "<strong>Order Details:</strong> <a href='" . route('user-event-details',$eventDetailsId) . "'>" . route('user-event-details',$eventDetailsId) . "</a>" : "",
            'website_title' => 'Shanti Jewelry',
            'templateType' => 'event_ticket',
            'type' => 'eventTicket'
        ];

        $mailer->mailFromAdmin($data);
        Session::forget('event_details_id');
    }
}
