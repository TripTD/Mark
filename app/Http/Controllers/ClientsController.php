<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Mail;

class ClientsController extends Controller
{
    //displaying the products available
    public function index() {
        /** @var array $cart */
        $cartList = Session::has('cart') ? Session::get('cart') : [];

        if($cartList && count($cartList)) {
            $items = Product::query()->whereNotIn('id', $cartList)->get();
        } else {
            $items =  Product::all();
        }

        return view('client.index', compact('items'));
    }

    //method used to redirect to login form or products if already logged in
    public function login() {

        $login = Session::has('logged') ? Session::get('logged') : [];
        if($login) {
            return redirect()->route('Admins.products');
        } else {
            return view('admins.login');
        }
    }

    //displaying the items inside the cart
    public function cart() {

        $cartList = Session::has('cart') ? Session::get('cart') : [];

        if($cartList && count($cartList)) {
            $items = Product::select()->whereIn('id', $cartList)->get();
        } else {
            $items = [];
        }

        return view('client.cart', compact('items'));
    }

    //method used for adding the items to cart
    public function addToCart(Request $request, $id) {

        $cartList = Session::has('cart') ? Session::get('cart') : [];
        $cartList[] = $id;
        $request->session()->put('cart', $cartList);

        return redirect('index');
    }

    //method to remove the item from the shopping cart
    public function removeFromCart($id) {

        $cartList = Session::has('cart') ? Session::get('cart') : [];

        if(($key = array_search($id, $cartList)) !== false) {
            unset($cartList[$key]);
        }
        session()->put('cart', $cartList);

        return redirect('cart');
    }



    //method used for composing the mail to be sent
    public function sendOrder(Request $request) {

        $this->validate($request, [
            'coustomer_name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ]);

        $cartList = Session::has('cart') ? Session::get('cart') : [];
        $items = [];
        if($cartList && count($cartList)) {
            $items = Product::select()->whereIn('id', $cartList)->get();
        }

        $data = array(
            'name' => $request->input('coustomer_name'),
            'from' => $request->input('email'),
            'comments' => $request->input('comments'),
            'url' => asset('storage/Images/'),
            'items' => $items,
        );

        $clientCredentials = array(
            'adr' => $request->input('email'),
            'name' => $request->input('coustomer_name'),
            'shop' => env('SHOP_EMAIL'),
            'shopName' => 'IT Mecha Tech',
        );

        Mail::send('client.mail', $data, function($message) use($clientCredentials) {
            /** @var \Illuminate\Mail\Message $message */
            $message->to($clientCredentials['shop'], $clientCredentials['shopName'])->subject('Order List');
            $message->from($clientCredentials['adr'], $clientCredentials['name']);
        });

        Session::forget('cart');
        return redirect()->route('Clients.cart');
    }
}
