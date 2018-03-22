<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class AdminsController extends Controller
{
    //displaying the big table with all the products
    public function products() {

        $login = Session::has('logged') ? Session::get('logged') : [];
        if($login) {

            $items = Product::all();
            return view('admins.products', compact('items'));

        } else {
            return view('admins.login');
        }

    }

    //displaying a certain product to be edited or up to insertion
    public function product() {

        $login = Session::has('logged') ? Session::get('logged') : [];
        if($login) {
            return view('admins.product');
        } else {
            return view('admins.login');
        }

    }

    //method used for login and access to products
    public function postLogin( Request $request) {

        $this->validate($request,[
            'username' => 'required',
            'password' =>'required'
        ]);

        if( env('AP_USER') == $request->input('username') && env('AP_PASSWORD') == $request->input('password')) {

            $login = Session::has('logged') ? Session::get('logged') : [];
            $login[] = 1;
            session()->put('logged',$login);

            return redirect()->route('Admins.products');
        }

        return redirect()->back();
    }

    //method used for clearing the data session upon logging off
    public function logout(Request $request) {

        $login = Session::has('logged') ? Session::get('logged') : null;
        Session::forget('logged');

        return redirect()->route('Clients.index');
    }
}
