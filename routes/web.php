<?php

use Illuminate\Support\Facades\Route;
use App\Permalink;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth:admin', 'setLfmPath']], function () {
  \UniSharp\LaravelFilemanager\Lfm::routes();
  Route::post('summernote/upload', 'Admin\SummernoteController@uploadFileManager')->name('lfm.summernote.upload');
});


/*=======================================================
******************** Admin Routes **********************
=======================================================*/

Route::group(['prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
  Route::post('/login', 'Admin\LoginController@authenticate')->name('admin.auth');

  Route::get('/mail-form', 'Admin\ForgetController@mailForm')->name('admin.forget.form');
  Route::post('/sendmail', 'Admin\ForgetController@sendmail')->name('admin.forget.mail');
});



Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin', 'checkstatus']], function () {

  // Admin logout Route
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  // Summernote image upload
  Route::post('/summernote/upload', 'Admin\SummernoteController@upload')->name('admin.summernote.upload');

  // Admin File Manager Routes
  Route::get('/file-manager', 'Admin\SummernoteController@fileManager')->name('admin.file-manager');

  // Admin logout Route
  Route::get('/logout', 'Admin\LoginController@logout')->name('admin.logout');

  Route::group(['middleware' => 'checkpermission:Dashboard'], function () {
    // Admin Dashboard Routes
    Route::get('/dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
  });

  // Admin Profile Routes
  Route::get('/changePassword', 'Admin\ProfileController@changePass')->name('admin.changePass');
  Route::post('/profile/updatePassword', 'Admin\ProfileController@updatePassword')->name('admin.updatePassword');
  Route::get('/profile/edit', 'Admin\ProfileController@editProfile')->name('admin.editProfile');
  Route::post('/propic/update', 'Admin\ProfileController@updatePropic')->name('admin.propic.update');
  Route::post('/profile/update', 'Admin\ProfileController@updateProfile')->name('admin.updateProfile');


  Route::group(['middleware' => 'checkpermission:Users Management'], function () {
    // Register User start
    Route::get('register/users', 'Admin\RegisterUserController@index')->name('admin.register.user');
    Route::post('register/users/ban', 'Admin\RegisterUserController@userban')->name('register.user.ban');
    Route::post('register/users/email', 'Admin\RegisterUserController@emailStatus')->name('register.user.email');
    Route::get('register/user/details/{id}', 'Admin\RegisterUserController@view')->name('register.user.view');
    Route::post('register/user/delete', 'Admin\RegisterUserController@delete')->name('register.user.delete');
    Route::post('register/user/bulk-delete', 'Admin\RegisterUserController@bulkDelete')->name('register.user.bulk.delete');
    Route::get('register/user/{id}/changePassword', 'Admin\RegisterUserController@changePass')->name('register.user.changePass');
    Route::post('register/user/updatePassword', 'Admin\RegisterUserController@updatePassword')->name('register.user.updatePassword');
    //Register User end

  });


  Route::group(['middleware' => 'checkpermission:Role Management'], function () {
    // Admin Roles Routes
    Route::get('/roles', 'Admin\RoleController@index')->name('admin.role.index');
    Route::post('/role/store', 'Admin\RoleController@store')->name('admin.role.store');
    Route::post('/role/update', 'Admin\RoleController@update')->name('admin.role.update');
    Route::post('/role/delete', 'Admin\RoleController@delete')->name('admin.role.delete');
    Route::get('role/{id}/permissions/manage', 'Admin\RoleController@managePermissions')->name('admin.role.permissions.manage');
    Route::post('role/permissions/update', 'Admin\RoleController@updatePermissions')->name('admin.role.permissions.update');
  });


  Route::group(['middleware' => 'checkpermission:Users Management'], function () {
    // Admin Users Routes
    Route::get('/users', 'Admin\UserController@index')->name('admin.user.index');
    Route::post('/user/store', 'Admin\UserController@store')->name('admin.user.store');
    Route::get('/user/{id}/edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::post('/user/update', 'Admin\UserController@update')->name('admin.user.update');
    Route::post('/user/delete', 'Admin\UserController@delete')->name('admin.user.delete');
  });

    // review
    Route::post('product/review/submit', 'Front\ReviewController@reviewsubmit')->name('product.review.submit');



  // Admin Product Management Routes
  Route::group(['middleware' => 'checkpermission:Shop Management'], function () {
    Route::get('/category', 'Admin\ProductCategory@index')->name('admin.category.index');
    Route::post('/category/store', 'Admin\ProductCategory@store')->name('admin.category.store');
    Route::get('/category/{id}/edit', 'Admin\ProductCategory@edit')->name('admin.category.edit');
    Route::post('/category/update', 'Admin\ProductCategory@update')->name('admin.category.update');
    Route::post('/category/feature', 'Admin\ProductCategory@feature')->name('admin.category.feature');
    Route::post('/category/home', 'Admin\ProductCategory@home')->name('admin.category.home');
    Route::post('/category/delete', 'Admin\ProductCategory@delete')->name('admin.category.delete');
    Route::post('/category/bulk-delete', 'Admin\ProductCategory@bulkDelete')->name('admin.pcategory.bulk.delete');

    Route::get('/shipping', 'Admin\ShopSettingController@index')->name('admin.shipping.index');
    Route::post('/shipping/store', 'Admin\ShopSettingController@store')->name('admin.shipping.store');
    Route::get('/shipping/{id}/edit', 'Admin\ShopSettingController@edit')->name('admin.shipping.edit');
    Route::post('/shipping/update', 'Admin\ShopSettingController@update')->name('admin.shipping.update');
    Route::post('/shipping/delete', 'Admin\ShopSettingController@delete')->name('admin.shipping.delete');

    Route::get('/product', 'Admin\ProductController@index')->name('admin.product.index');
    Route::get('/product/create', 'Admin\ProductController@create')->name('admin.product.create');
    Route::post('/product/store', 'Admin\ProductController@store')->name('admin.product.store');
    Route::get('/product/{id}/edit', 'Admin\ProductController@edit')->name('admin.product.edit');
    Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
    Route::post('/product/feature', 'Admin\ProductController@feature')->name('admin.product.feature');
    Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
    Route::get('/product/populer/tags/', 'Admin\ProductController@populerTag')->name('admin.product.tags');
    Route::post('/product/populer/tags/update', 'Admin\ProductController@populerTagupdate')->name('admin.popular-tag.update');
    Route::post('/product/paymentStatus', 'Admin\ProductController@paymentStatus')->name('admin.product.paymentStatus');

    Route::get('product/{id}/getcategory', 'Admin\ProductController@getCategory')->name('admin.product.getcategory');
    Route::post('/product/delete', 'Admin\ProductController@delete')->name('admin.product.delete');
    Route::post('/product/bulk-delete', 'Admin\ProductController@bulkDelete')->name('admin.product.bulk.delete');
    Route::post('/product/sliderupdate', 'Admin\ProductController@sliderupdate')->name('admin.product.sliderupdate');
    Route::post('/product/{id}/uploadUpdate', 'Admin\ProductController@uploadUpdate')->name('admin.product.uploadUpdate');
    Route::post('/product/update', 'Admin\ProductController@update')->name('admin.product.update');
    Route::get('/product/{id}/images', 'Admin\ProductController@images')->name('admin.product.images');


    Route::get('/product/settings', 'Admin\ProductController@settings')->name('admin.product.settings');
    Route::post('/product/settings', 'Admin\ProductController@updateSettings')->name('admin.product.settings');


    // Admin Coupon Routes
    Route::get('/coupon', 'Admin\CouponController@index')->name('admin.coupon.index');
    Route::post('/coupon/store', 'Admin\CouponController@store')->name('admin.coupon.store');
    Route::get('/coupon/{id}/edit', 'Admin\CouponController@edit')->name('admin.coupon.edit');
    Route::post('/coupon/update', 'Admin\CouponController@update')->name('admin.coupon.update');
    Route::post('/coupon/delete', 'Admin\CouponController@delete')->name('admin.coupon.delete');
    // Admin Coupon Routes End


    // Product Order
    Route::get('/product/all/orders', 'Admin\ProductOrderController@all')->name('admin.all.product.orders');
    Route::get('/product/pending/orders', 'Admin\ProductOrderController@pending')->name('admin.pending.product.orders');
    Route::get('/product/processing/orders', 'Admin\ProductOrderController@processing')->name('admin.processing.product.orders');
    Route::get('/product/completed/orders', 'Admin\ProductOrderController@completed')->name('admin.completed.product.orders');
    Route::get('/product/rejected/orders', 'Admin\ProductOrderController@rejected')->name('admin.rejected.product.orders');
    Route::post('/product/orders/status', 'Admin\ProductOrderController@status')->name('admin.product.orders.status');
    Route::get('/product/orders/detais/{id}', 'Admin\ProductOrderController@details')->name('admin.product.details');
    Route::post('/product/order/delete', 'Admin\ProductOrderController@orderDelete')->name('admin.product.order.delete');
    Route::post('/product/order/bulk-delete', 'Admin\ProductOrderController@bulkOrderDelete')->name('admin.product.order.bulk.delete');
    Route::get('/product/orders/report', 'Admin\ProductOrderController@report')->name('admin.orders.report');
    Route::get('/product/export/report', 'Admin\ProductOrderController@exportReport')->name('admin.orders.export');
    Route::post('/orders/status', 'Admin\PackageController@status')->name('admin.orders.status');
    Route::post('/orders/mail', 'Admin\PackageController@mail')->name('admin.orders.mail');
    // Product Order end
  });


  //Event Manage Routes
  Route::group(['middleware' => 'checkpermission:Events Management'], function () {
    Route::get('/event/categories', 'Admin\EventCategoryController@index')->name('admin.event.category.index');
    Route::post('/event/category/store', 'Admin\EventCategoryController@store')->name('admin.event.category.store');
    Route::post('/event/category/update', 'Admin\EventCategoryController@update')->name('admin.event.category.update');
    Route::post('/event/category/delete', 'Admin\EventCategoryController@delete')->name('admin.event.category.delete');
    Route::post('/event/categories/bulk-delete', 'Admin\EventCategoryController@bulkDelete')->name('admin.event.category.bulk.delete');


    // Admin Event Routes
    Route::get('/event/settings', 'Admin\EventController@settings')->name('admin.event.settings');
    Route::post('/event/settings', 'Admin\EventController@updateSettings')->name('admin.event.settings');
    Route::get('/events', 'Admin\EventController@index')->name('admin.event.index');
    Route::post('/event/upload', 'Admin\EventController@upload')->name('admin.event.upload');
    Route::post('/event/slider/remove', 'Admin\EventController@sliderRemove')->name('admin.event.slider-remove');
    Route::post('/event/store', 'Admin\EventController@store')->name('admin.event.store');
    Route::get('/event/{id}/edit', 'Admin\EventController@edit')->name('admin.event.edit');
    Route::get('/event/{id}/images', 'Admin\EventController@images')->name('admin.event.images');
    Route::post('/event/update', 'Admin\EventController@update')->name('admin.event.update');
    Route::post('/event/{id}/uploadUpdate', 'Admin\EventController@uploadUpdate')->name('admin.event.uploadUpdate');
    Route::post('/event/delete', 'Admin\EventController@delete')->name('admin.event.delete');
    Route::post('/event/bulk-delete', 'Admin\EventController@bulkDelete')->name('admin.event.bulk.delete');
    Route::get('/event/get-categories', 'Admin\EventController@getCategories')->name('admin.event.get-categories');
    Route::get('/events/payment-log', 'Admin\EventController@paymentLog')->name('admin.event.payment.log');
    Route::post('/events/payment-log/delete', 'Admin\EventController@paymentLogDelete')->name('admin.event.payment.delete');
    Route::post('/events/payment/bulk-delete', 'Admin\EventController@paymentLogBulkDelete')->name('admin.event.payment.bulk.delete');
    Route::post('/events/payment-log-update', 'Admin\EventController@paymentLogUpdate')->name('admin.event.payment.log.update');
    Route::get('/events/report', 'Admin\EventController@report')->name('admin.event.report');
    Route::get('/events/export', 'Admin\EventController@exportReport')->name('admin.event.export');
  });


  Route::group(['middleware' => 'checkpermission:Client Feedbacks'], function () {
    // Admin View Client Feedbacks Routes
    Route::get('/feedbacks', 'Admin\FeedbackController@feedbacks')->name('admin.client_feedbacks');
    Route::post('/delete_feedback', 'Admin\FeedbackController@deleteFeedback')->name('admin.delete_feedback');
    Route::post('/feedback/bulk-delete', 'Admin\FeedbackController@bulkDelete')->name('admin.feedback.bulk.delete');
  });
});


// User Login and Register routes
Route::group(['middleware' => ['web', 'setlang']], function () {
  Route::get('/login', 'User\LoginController@login')->name('user.login.submit');

  Route::get('/register', 'User\RegisterController@registerPage')->name('user-register');
  Route::post('/register/submit', 'User\RegisterController@register')->name('user-register-submit');
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
  Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
});


Route::group(['middleware' => ['web', 'setlang']], function () {
  Route::get('/login', 'User\LoginController@showLoginForm')->name('user.login');
  Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
  Route::get('/register', 'User\RegisterController@registerPage')->name('user-register');
  Route::post('/register/submit', 'User\RegisterController@register')->name('user-register-submit');
  Route::get('/register/verify/{token}', 'User\RegisterController@token')->name('user-register-token');
  Route::get('/forgot', 'User\ForgotController@showforgotform')->name('user-forgot');
  Route::post('/forgot', 'User\ForgotController@forgot')->name('user-forgot-submit');
});


// User Routes
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'userstatus', 'setlang']], function () {
  // Summernote image upload
  Route::post('/summernote/upload', 'User\SummernoteController@upload')->name('user.summernote.upload');

  Route::get('/dashboard', 'User\UserController@index')->name('user-dashboard');
  Route::get('/reset', 'User\UserController@resetform')->name('user-reset');
  Route::post('/reset', 'User\UserController@reset')->name('user-reset-submit');
  Route::get('/profile', 'User\UserController@profile')->name('user-profile');
  Route::post('/profile', 'User\UserController@profileupdate')->name('user-profile-update');
  Route::get('/shipping/details', 'User\UserController@shippingdetails')->name('shpping-details');
  Route::post('/shipping/details/update', 'User\UserController@shippingupdate')->name('user-shipping-update');
  Route::get('/logout', 'User\LoginController@logout')->name('user-logout');
  Route::get('/billing/details', 'User\UserController@billingdetails')->name('billing-details');
  Route::post('/billing/details/update', 'User\UserController@billingupdate')->name('billing-update');
  Route::get('/orders', 'User\OrderController@index')->name('user-orders');
  Route::get('/order/{id}', 'User\OrderController@orderdetails')->name('user-orders-details');
  Route::get('/events', 'User\EventController@index')->name('user-events');
  Route::get('/event/{id}', 'User\EventController@eventdetails')->name('user-event-details');
  Route::post('/zip-file/upload', 'User\TicketController@zip_upload')->name('zip.upload');
});


/*=======================================================
******************** Front Routes **********************
=======================================================*/

Route::group(['middleware' => 'setlang'], function () {

  Route::get('/', 'Front\FrontendController@index')->name('front.index');

  Route::group(['prefix' => 'donation'], function () {
    Route::get('/paystack/success', 'Payment\causes\PaystackController@successPayment')->name('donation.paystack.success');
  });
  // Package Order Routes
  Route::post('/package-order', 'Front\FrontendController@submitorder')->name('front.packageorder.submit');
  Route::get('/order-confirmation/{packageid}/{packageOrderId}', 'Front\FrontendController@orderConfirmation')->name('front.packageorder.confirmation');
  Route::get('/payment/{packageid}/cancle', 'Payment\PaymentController@paycancle')->name('front.payment.cancle');

    //event tickets payment
    Route::post('/event/payment', 'Front\EventController@makePayment')->name('front.event.payment');
  //Paystack Routes
  Route::post('/paystack/submit', 'Payment\PaystackController@store')->name('front.paystack.submit');

  Route::post('/payment/instructions', 'Front\FrontendController@paymentInstruction')->name('front.payment.instructions');


  // Product
  Route::get('/cart', 'Front\ProductController@cart')->name('front.cart');
  Route::get('/add-to-cart/{id}', 'Front\ProductController@addToCart')->name('add.cart');
  Route::post('/cart/update', 'Front\ProductController@updatecart')->name('cart.update');
  Route::get('/cart/item/remove/{id}', 'Front\ProductController@cartitemremove')->name('cart.item.remove');
  Route::get('/checkout', 'Front\ProductController@checkout')->name('front.checkout');
  Route::get('/checkout/{slug}', 'Front\ProductController@Prdouctcheckout')->name('front.product.checkout');
  Route::post('/coupon', 'Front\ProductController@coupon')->name('front.coupon');

// CHECKOUT SECTION
Route::get('/product/payment/return', 'Payment\product\PaymentController@payreturn')->name('product.payment.return');
Route::get('/product/payment/cancle', 'Payment\product\PaymentController@paycancle')->name('product.payment.cancle');
Route::get('/product/paypal/notify', 'Payment\product\PaypalController@notify')->name('product.paypal.notify');
// paypal routes
Route::post('/product/paypal/submit', 'Payment\product\PaypalController@store')->name('product.paypal.submit');
// stripe routes
Route::post('/product/stripe/submit', 'Payment\product\StripeController@store')->name('product.stripe.submit');
Route::post('/product/offline/{gatewayid}/submit', 'Payment\product\OfflineController@store')->name('product.offline.submit');
//Flutterwave Routes
Route::post('/product/flutterwave/submit', 'Payment\product\FlutterWaveController@store')->name('product.flutterwave.submit');
Route::post('/product/flutterwave/notify', 'Payment\product\FlutterWaveController@notify')->name('product.flutterwave.notify');
Route::get('/product/flutterwave/notify', 'Payment\product\FlutterWaveController@success')->name('product.flutterwave.success');
//Paystack Routes
Route::post('/product/paystack/submit', 'Payment\product\PaystackController@store')->name('product.paystack.submit');
// RazorPay
Route::post('/product/razorpay/submit', 'Payment\product\RazorpayController@store')->name('product.razorpay.submit');
Route::post('/product/razorpay/notify', 'Payment\product\RazorpayController@notify')->name('product.razorpay.notify');
//Instamojo Routes
Route::post('/product/instamojo/submit', 'Payment\product\InstamojoController@store')->name('product.instamojo.submit');
Route::get('/product/instamojo/notify', 'Payment\product\InstamojoController@notify')->name('product.instamojo.notify');
//PayTM Routes
Route::post('/product/paytm/submit', 'Payment\product\PaytmController@store')->name('product.paytm.submit');
Route::post('/product/paytm/notify', 'Payment\product\PaytmController@notify')->name('product.paytm.notify');
//Mollie Routes
Route::post('/product/mollie/submit', 'Payment\product\MollieController@store')->name('product.mollie.submit');
Route::get('/product/mollie/notify', 'Payment\product\MollieController@notify')->name('product.mollie.notify');
// Mercado Pago
Route::post('/product/mercadopago/submit', 'Payment\product\MercadopagoController@store')->name('product.mercadopago.submit');
Route::post('/product/mercadopago/notify', 'Payment\product\MercadopagoController@notify')->name('product.mercadopago.notify');
// PayUmoney
Route::post('/product/payumoney/submit', 'Payment\product\PayumoneyController@store')->name('product.payumoney.submit');
Route::post('/product/payumoney/notify', 'Payment\product\PayumoneyController@notify')->name('product.payumoney.notify');
// CHECKOUT SECTION ENDS

});


if (!app()->runningInConsole()) {
  // Dynamic Routes

  Route::group(['middleware' => ['setlang']], function () {
  
    $wdPermalinks = Permalink::where('details', 1)->get();
    foreach ($wdPermalinks as $pl) {
      $type = $pl->type;
      $permalink = $pl->permalink;
  
      if ($type == 'product_details') {
        Route::get("$permalink/{slug}", 'Front\ProductController@productDetails')->name('front.product.details');
      } elseif ($type == 'event_details') {
        Route::get("$permalink/{slug}", 'Front\FrontendController@eventDetails')->name('front.event_details');
      }
    }
  });

  Route::group([], function () {

    $wdPermalinks = Permalink::where('details', 0)->get();
    foreach ($wdPermalinks as $pl) {
      $type = $pl->type;
      $permalink = $pl->permalink;

      if ($type == 'login') {
        $action = 'User\LoginController@showLoginForm';
        $routeName = 'user.login';
        // Route::get("$permalink", "$action")->name("$routeName");
      }elseif ($type == 'products') {
        $action = 'Front\ProductController@product';
        $routeName = 'front.product';
        Route::get("$permalink", "$action")->name("$routeName");
      } elseif ($type == 'register') {
        $action = 'User\RegisterController@registerPage';
        $routeName = 'user-register';
      } elseif ($type == 'admin_login') {
        $action = 'Admin\LoginController@login';
        $routeName = 'admin.login';
        Route::get("$permalink", "$action")->name("$routeName")->middleware('guest:admin');
        continue;
      }
    }

    Route::get("$permalink", "$action")->name("$routeName");
  });
}
