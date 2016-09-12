<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function() {
    return view('welcome');
});
Route::post('/item/create', ['as' => 'item.store', 'uses' => 'ItemController@store']);
Route::resource('item', 'ItemController');


Route::group(['middleware' => ['web']], function(){

    Route::get('/checkout', function() {
        return view('cart.checkout');
    });



    Route::get('/home', 'HomeController@index');
    Route::post('/item', 'ItemController@store');
    Route::get('/item', 'ItemController@index');
    Route::get('/item/{id}', 'ItemController@show');
    Route::get('/addItem/{productID}', 'CartController@addItem');
    Route::get('/removeItem/{productID}', 'CartController@removeItem');




    Route::post('/create_payment', function(){
// Set your secret key: remember to change this to your live secret key in production
// See your keys here https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_VVSBY8xjNklioi7V0yFVfx6Q");

        $receiver = \Stripe\BitcoinReceiver::create(array(
            "amount" => 1000,    // amount in cents
            "currency" => "usd", // presently can only be USD
            "email" => "payinguser+fill_now@example.com"
        ));

        $charge = \Stripe\Charge::create(array(
            "amount" => $receiver->amount,
            "currency" => $receiver->currency,
            "source" => $receiver->id,
            "description" => "Example charge"
        ));
        Route::controllers([
            'auth' => 'Auth\AuthController',
            'password' => 'Auth\PasswordController'
        ]);
    });


    Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
    Route::get('/register', 'Auth\AuthController@getRegister');
    Route::post('/register', 'Auth\AuthController@postRegister');

});


//Route


