<?php

use App\Http\Controllers\AddAddressController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CreateorderController;
use App\Mail\acercaMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */
//enable verify route
Auth::routes(['verify' => true]);

// Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/', 'App\Http\Controllers\ProductController@index')->name('home.index');
// Route::get('/about', 'App\Http\Controllers\HomeController@about')->name('home.about');
Route::get('/productos', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/todo', 'App\Http\Controllers\CardController@index')->name('product.card');
Route::get('/productos/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

// Categories
Route::get('/accesorios', 'App\Http\Controllers\ProductController@accesorios')->name('product.categories.accesorios');
Route::get('/computadoras', 'App\Http\Controllers\ProductController@computadoras')->name('product.categories.computadoras');
Route::get('/electronica', 'App\Http\Controllers\ProductController@electronica')->name('product.categories.electronica');
Route::get('/hardware', 'App\Http\Controllers\ProductController@hardware')->name('product.categories.hardware');
// Subcategories
Route::get('/accesorios/alfombrillas', 'App\Http\Controllers\ProductController@accesoriosalfombrillas')->name('product.categories.accesorios.accesorios_alfombrillas');
Route::get('/accesorios/audifonos', 'App\Http\Controllers\ProductController@accesoriosaudifonos')->name('product.categories.accesorios.accesorios_audifonos');
Route::get('/accesorios/mouse', 'App\Http\Controllers\ProductController@accesoriosmouse')->name('product.categories.accesorios.accesorios_mouse');
Route::get('/accesorios/teclados', 'App\Http\Controllers\ProductController@accesoriosteclados')->name('product.categories.accesorios.accesorios_teclados');
Route::get('/computadoras/escritorio', 'App\Http\Controllers\ProductController@computadorasescritorio')->name('product.categories.computadoras.computadoras_escritorio');
Route::get('/computadoras/laptop', 'App\Http\Controllers\ProductController@computadoraslaptop')->name('product.categories.computadoras.computadoras_laptop');
Route::get('/electronica/bocinas', 'App\Http\Controllers\ProductController@electronicabocinas')->name('product.categories.electronica.electronica_bocinas');
Route::get('/electronica/camaras', 'App\Http\Controllers\ProductController@electronicacamaras')->name('product.categories.electronica.electronica_camaras');
Route::get('/electronica/consolas', 'App\Http\Controllers\ProductController@electronicaconsolas')->name('product.categories.electronica.electronica_consolas');
Route::get('/electronica/monitores', 'App\Http\Controllers\ProductController@electronicamonitores')->name('product.categories.electronica.electronica_monitores');
Route::get('/electronica/telefonos', 'App\Http\Controllers\ProductController@electronicatelefonos')->name('product.categories.electronica.electronica_telefonos');
Route::get('/electronica/tv', 'App\Http\Controllers\ProductController@electronicatv')->name('product.categories.electronica.electronica_tv');
Route::get('/hardware/disipadores', 'App\Http\Controllers\ProductController@hardwaredisipadores')->name('product.categories.hardware.hardware_disipadores');
Route::get('/hardware/gabinetes', 'App\Http\Controllers\ProductController@hardwaregabinetes')->name('product.categories.hardware.hardware_gabinetes');
Route::get('/hardware/graficas', 'App\Http\Controllers\ProductController@hardwaregpu')->name('product.categories.hardware.hardware_gpu');
Route::get('/hardware/hdd', 'App\Http\Controllers\ProductController@hardwarehdd')->name('product.categories.hardware.hardware_hdd');
Route::get('/hardware/procesadores', 'App\Http\Controllers\ProductController@hardwareprocesadores')->name('product.categories.hardware.hardware_procesadores');
Route::get('/hardware/ram', 'App\Http\Controllers\ProductController@hardwareram')->name('product.categories.hardware.hardware_ram');
Route::get('/hardware/ssd', 'App\Http\Controllers\ProductController@hardwaressd')->name('product.categories.hardware.hardware_ssd');
Route::get('/hardware/usb', 'App\Http\Controllers\ProductController@hardwareusb')->name('product.categories.hardware.hardware_usb');
Route::get('/hardware/motherboards', 'App\Http\Controllers\ProductController@hardwaremotherboard')->name('product.categories.hardware.hardware_motherboard');
Route::get('/hardware/fuentes', 'App\Http\Controllers\ProductController@hardwarefuentes')->name('product.categories.hardware.hardware_fuentes');
//banners
Route::get('/banner/mac', 'App\Http\Controllers\ProductController@bannermac')->name('product.banner.mac');
Route::get('/banner/nvidia', 'App\Http\Controllers\ProductController@bannernvidia')->name('product.banner.nvidia');
Route::get('/banner/adata', 'App\Http\Controllers\ProductController@banneradata')->name('product.banner.adata');
Route::get('/banner/toshiba', 'App\Http\Controllers\ProductController@bannertoshiba')->name('product.banner.toshiba');
Route::get('/banner/lg', 'App\Http\Controllers\ProductController@bannerlg')->name('product.banner.lg');
//treadkmarks
Route::get('/product/trademarks/nvidia', 'App\Http\Controllers\ProductController@nvidia')->name('trademark.nvidia');
Route::get('/product/trademarks/dell', 'App\Http\Controllers\ProductController@dell')->name('trademark.dell');
Route::get('/product/trademarks/gigabyte', 'App\Http\Controllers\ProductController@gigabyte')->name('trademark.gigabyte');
Route::get('/product/trademarks/hp', 'App\Http\Controllers\ProductController@hp')->name('trademark.hp');
// submenus
Route::get('/armatucomputadora', function () {
    return view('product.submenus.arma');
});

Route::get('/almacenamiento', function () {
    return view('product.submenus.almacenamiento');
});

Route::get('/computadras', function () {
    return view('product.submenus.computadoras');
});

Route::get('/accesrios', function () {
    return view('product.submenus.accesorios');
});

Route::get('/electrnica', function () {
    return view('product.submenus.electronica');
});

//shopping cart
Route::get('/TuCarrito', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::get('/TuCarrito/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/TuCarrito/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');

Route::middleware('auth', 'verified')->group(function () {
    Route::post('/TuCarrito/purchase', [CreateorderController::class, 'puchase'])->name('cart.purchase');
    Route::get('/TuCarrito/purchase', [CreateorderController::class, 'puchase'])->name('cart.purchase');
    // orders
    Route::get('/pedidos', 'App\Http\Controllers\MyAccountController@orders')->name('myaccount.orders');

    Route::get('/pedidos/{id}', 'App\Http\Controllers\MyAccountController@show')->name('myaccount.orders.show');
    Route::get('/pedidos/{id}/cancel', 'App\Http\Controllers\MyAccountController@cancel')->name('myaccount.orders.show.cancel');

    // account edit
    Route::get('/miusuario', 'App\Http\Controllers\MyAccountController@edit')->name('myaccount.edit');
    Route::any('/miuser', 'App\Http\Controllers\MyAccountController@update')->name('myaccount.edit.update');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/contactar', 'App\Http\Controllers\EmailController@contact')->name('contact');

// chatbot

Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);

Route::get('/chatbot', function () {
    return view('chatbot.chat');
});

//footer

Route::get('/terminosycondiciones', function () {
    return view('footer.tyc');
});

Route::get('/avisodeprivacidad', function () {
    return view('footer.av');
});

Route::get('/Sugerencias', function () {
    return view('footer.form');
});

Route::get('/opinion', function () {
    $correo = new acercaMailable;

    Mail::to('marktechof@gmail.com')->send($correo);

    return 'Correo enviado';

    return view('opinion');
});

// Login

Route::get('/IniciarSesion', function () {
    return view('auth.login');
});

Route::get('/Registro', function () {
    return view('auth.register');
});

//Orders
Route::post('/datoss/', [CreateorderController::class, 'completeOrder']);

Route::view('/datos', 'cart.payment');
Route::get('/datos', 'App\Http\Controllers\CreateorderController@index')->name('cart.payment');
Route::post('/datos/', [CreateorderController::class, 'puchase']);
Route::any('/datoss', 'App\Http\Controllers\CreateorderController@completeOrder')->name('complete.order');

// address
Route::view('/direcciones', 'form.addaddress');
Route::get('/direcciones', 'App\Http\Controllers\AddAddressController@index')->name('form.addaddress');
Route::post('/direcciones/', [AddAddressController::class, 'addaddress']);

//account route resources
// Route::resource('/dir', App\Http\Controllers\AddressController::class);
Route::get('/micuenta', 'App\Http\Controllers\MyAccountController@getUser')->name('myaccount.my');

// Address
Route::get('/misdatos', 'App\Http\Controllers\AddressController@index')->name('myaccount.myaddress');
Route::post('/direccion/store', 'App\Http\Controllers\AddressController@store')->name('myaccount.myaddress.store');
Route::get('/direccion/{id:hashid}', 'App\Http\Controllers\AddressController@edit')->name('myaccount.myaddress.edit');
Route::put('/direccion/{id:hashid}', 'App\Http\Controllers\AddressController@update')->name('myaccount.myaddress.update');
Route::delete('/direccion/{id}', 'App\Http\Controllers\AddressController@delete')->name('myaccount.myaddress.delete');
// search
Route::any('/busqueda', 'App\Http\Controllers\SearchController@search')->name('search.search');
Route::any('/busquedaerror', 'App\Http\Controllers\SearchController@search')->name('search.nofound');

// stripe
Route::any('stripe/success/{id}', [App\Http\Controllers\StripeController::class, 'payment']);
Route::any('stripe/cancel/', [App\Http\Controllers\StripeController::class, 'cancel']);
//paypal
Route::match(['GET', 'POST'], 'payment', [App\Http\Controllers\PayPalController::class, 'payment'])->name('completepayment');
Route::match(['GET', 'POST'], 'completesuccess/{id}', [App\Http\Controllers\PayPalController::class, 'completesuccess']);
Route::get('error', [App\Http\Controllers\PayPalController::class, 'error']);

#Mobile
Route::get('/settingsm', function () {
    return view('mobile.settingsm');
});
Route::get('/categoriesm', function () {
    return view('mobile.categoriesm');
});
#settings
Route::get('/aboutm', function () {
    return view('mobile.settings.about');
});
Route::get('/helpm', function () {
    return view('mobile.settings.help');
});
Route::get('/theme', function () {
    return view('mobile.settings.theme');
});
Route::get('/languagem', function () {
    return view('mobile.settings.language');
});
