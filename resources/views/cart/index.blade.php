@extends('app'):
@section('content');

    <h1>View Cart</h1>
    <hr>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>

                <th>Product</th>
                <th></th>
                <th class="text-center"></th>
                <th class=""text-center">Total</th>
                <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach($items as $item)

                    <tr>
                        <td class="col-sm-8 col-md-8">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"><img
Signup for the Newsletter

Email Address:

Author Posts

    Laravel 5 and Angular 2 Beta setup
    Laravel 5 and Angular 2 Beta setup
    23 January 2016
    Angular 2 Beta Simple Todo application
    Angular 2 Beta Simple Todo application
    30 December 2015
    From “idea” to TwitterGrade in 3 hours with Meteor
    From “idea” to TwitterGrade in 3 hours with M…
    16 November 2015

Featured Posts

    Laravel 5 and Angular 2 Beta setup
    Laravel 5 and Angular 2 Beta setup
    23 January 2016
    From “idea” to TwitterGrade in 3 hours with Meteor
    From “idea” to TwitterGrade in 3 hours with M…
    16 November 2015
    Use AngularJS as WordPress frontend
    Use AngularJS as WordPress frontend
    1 November 2015

Recent comments

    devinda on Laravel 5 and Angular 2 Beta setup
    Isma Haro on Laravel 5 and AngularJS Tutorial reloaded – Part 2
    Emali on Laravel 5 File upload, storage and download
    Jonathan Nungaray on AngularJS chat with Loopback and Socket.io – Backend
    Violacase on Use AngularJS as WordPress frontend

Signup the CODETutorial.io newsletter…

Email Address:

The Shopping cart – How to craft a e-shop with Laravel
authorcoder01
15 September 2015 Laravel 5

In this second part of the tutorial we will see how to create the shopping cart for our e-shop. The cart will be associated to the customer and stored into the database. Using this approach a customer that will leave our shop and come back after some time will found his cart as he left it.

The first thing we need to create is the forms to let the customer signing up an login the application. All the releative logic is already present in the Laravel basic application, we only need to define the view and the routes.

Let start by creating  a new folder into the view and call it auth. Inside this folder create two files register.blade.php and login.blade.php

The code for both files is below, copy and paste it


@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                </div>
                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form method="POST" action="/auth/login" class="form-horizontal" role="form">
                        {!! csrf_field() !!}

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="" placeholder="email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input iremember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button type="submit" id="btn-login" href="#" class="btn btn-success">Login  </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="/auth/register" >
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60



@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                </div>
                <div style="padding-top:30px" class="panel-body" >
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form method="POST" action="/auth/login" class="form-horizontal" role="form">
                        {!! csrf_field() !!}

                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="email" type="text" class="form-control" name="email" value="" placeholder="email">
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="password">
                        </div>
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input iremember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls">
                                <button type="submit" id="btn-login" href="#" class="btn btn-success">Login  </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account!
                                    <a href="/auth/register" >
                                        Sign Up Here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection





@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form method="POST" action="/auth/register"  class="form-horizontal" role="form">
                        {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" id="btn-signup" class="btn btn-success"><i class="fa fa-hand-o-right"></i> &nbsp Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59



@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form method="POST" action="/auth/register"  class="form-horizontal" role="form">
                        {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" id="btn-signup" class="btn btn-success"><i class="fa fa-hand-o-right"></i> &nbsp Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



Once both register and login view is in place will be enough to define the auth routes to make the login and register process working. Paste the code below into the routes.php file


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

1
2
3
4
5
6
7
8
9
10
11
12



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



Now if you run the application you will be able to register, login and logout as a customer. The link to the register and login form was already coded into the template file in the navbar. The result will be something like show in the picture.

Schermata 2015-09-15 alle 20.31.02

As you can see, as soon as you register a new user its redirected to http://localhost:8000/home, but it’s different from our home page. To change this behaviour a simple variable declaration is needed into the AuthController.php file. Add the line below to the controller and after login or register you will be redirected to the product catalog.


    protected $redirectPath = '/';

1
2
3
4
5



    protected $redirectPath = '/';



The shopping cart

As we said at the begin of the tutorial the shopping cart will be store in the database. To make it possible we need two tables. Create the migration files for both tables using artisan command line :

php artisan make:migration create_table_carts

php artisan make:migration create_table_carts_item

The first table cart will be used to store cart basic information and the relation with the customer


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarts extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

   public function down()
    {
        Schema::drop('cart');

    }
}

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26



<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCarts extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

   public function down()
    {
        Schema::drop('cart');

    }
}



The second table will contain for each row the relation with a product and the cart.


<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCartsItem extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cart_items');
    }
}

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26



<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCartsItem extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id');
            $table->integer('product_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('cart_items');
    }
}



As we created the database table we need now the models to represent the entity in our application.

php artisan make:model Cart

php artisan make:model CartItem


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cartItems()
    {
        return $this->hasMany('App\CartItem');
    }

}

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cartItems()
    {
        return $this->hasMany('App\CartItem');
    }

}



Like specified in the table definition, we have to define the relation also in the model class. The Cart model belong to a User and have many CartItem.


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22



<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public function cart()
    {
        return $this->belongsTo('App\Cart');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}



Different from the Cart the CartItem model belong both to the Cart and the Product.

To take things separated all the function relative to the cart operation will be defined in a CartController. Create it by using artisan

php artisan make:controller CartController


<?php

namespace App\Http\Controllers;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem ($productId){

        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $cartItem  = new Cartitem();
        $cartItem->product_id=$productId;
        $cartItem->cart_id= $cart->id;
        $cartItem->save();

        return redirect('/cart');

    }

    public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('cart.view',['items'=>$items,'total'=>$total]);
    }

    public function removeItem($id){

        CartItem::destroy($id);
        return redirect('/cart');
    }

}

1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68



<?php

namespace App\Http\Controllers;
use App\Cart;
use App\CartItem;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem ($productId){

        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $cartItem  = new Cartitem();
        $cartItem->product_id=$productId;
        $cartItem->cart_id= $cart->id;
        $cartItem->save();

        return redirect('/cart');

    }

    public function showCart(){
        $cart = Cart::where('user_id',Auth::user()->id)->first();

        if(!$cart){
            $cart =  new Cart();
            $cart->user_id=Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total=0;
        foreach($items as $item){
            $total+=$item->product->price;
        }

        return view('cart.view',['items'=>$items,'total'=>$total]);
    }

    public function removeItem($id){

        CartItem::destroy($id);
        return redirect('/cart');
    }

}



Let explain the code of the CartController. As you can see the first method is the _construct. Here we instruct this controller to use always the auth middleware. This is needed because we want only the logged in customer to view the cart and add product to it.

The second function is the AddItem. This function first search for the cart associated to the currently logged user. If the retrieve fails, mean this is the first time the user use the cart, so we need to create a new instance of it and save to the database. Once we have the Cart instance a new CartItem is created and associated to it and to the product_id passed as the function argument. When the product is added to the cart a redirect is performed to the /cart url.

The /cart route will be served by the showCart function. This function, like the addProduct retrieve the Cart associated to the user from the database, if not present it create it. Then it loop trough all the items in the cart to calculate the total price and return a view passing the $item array and the calculated $total.

Last functin is the removeItem, basically it destroy the CartItem row in the database and the relation with the Cart.

Just a single view is needed to represent the shopping cart and the code for it is reported below, create a cart folder and a view.blade.php file and paste the code below into it :


@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th></th>
                    <th class="text-center"></th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$item->product->imageurl}}" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$item->product->name}}</a></h4>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$item->product->price}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <a href="/removeItem/{{$item->id}}"> <button type="button" class="btn btn-danger">
                                    <span class="fa fa-remove"></span> Remove
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong>${{$total}}</strong></h3></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                        <a href="/"> <button type="button" class="btn btn-default">
                                <span class="fa fa-shopping-cart"></span> Continue Shopping
                            </button>
                        </a></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="fa fa-play"></span>
                        </button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection



@extends('layouts.master')

@section('Digital shop', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th></th>
                    <th class="text-center"></th>
                    <th class="text-center">Total</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{$item->product->imageurl}}" style="width: 100px; height: 72px;"> </a>
                                <div class="media-body>">
                                    <h4 class="media-heading"><a href="#">{{$item->product->name}}</a></h4>
                                    <td class="col-sm-1 col-md-1">
                                    <a href="/removeItem?{{$item->id}}">Remove Item</a>
                </td>
                </tr>

      @endforeach


                    <tr>
                    <td><h3>Total</h3></td>
                        <td class="text-right"><strong>${{$otal}}</strong></td>
                        <td></td><a href="/"><button typr="button" class="btn btn-default"><span class="fa fa-shopping-cart"></span>Continue Shopping </button></a>
                        </td>
                        <td><button type="button" class="btn btn-success">Checkout <span class="fa fa-play"></span></button></td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    @endsection