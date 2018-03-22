<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;



class ProductsController extends Controller
{
    //method used for the editing part of a product
    public function editProduct(Request $request, $id) {

        $allowed = ["image/png","image/jpeg"];
        $prefix = time() . '_';

        if ($_FILES["img"]['size'] != 0) {
            if (!empty($_FILES["img"]["name"]) && !$_FILES["img"]['error']) {
                if (in_array($_FILES["img"]['type'], $allowed)) {
                    $image = $prefix . $_FILES["img"]["name"];
                    $file_path = 'storage/Images/' . $image;
                    move_uploaded_file($_FILES["img"]["tmp_name"], $file_path);
                }
            }
        }

        $item = Product::find($id);
        $item->title = $request->input('Title');
        $item->description = $request->input('Description');
        $item->price = $request->input('Price');
        if ($_FILES["img"]['size'] != 0) {
            $item->image = $image;
        }
        $item->timestamps = false;
        $item->save();

        return redirect()->route('Admins.products');
    }

    //method used to delete a product from database
    public function removeProduct(Request $request, $id) {

        $item = Product::find($id);
        $item->delete();
        return redirect()->route('Admins.products');
    }

    //method used to add a product to database
    public function insertProduct(Request $request) {

        $this->validate($request, [
            'Title' => 'required',
            'Description' => 'required',
            'Price' => 'required',
        ]);

        $allowed = ["image/png","image/jpeg"];
        $prefix = time() . '_';

        if ($_FILES["img"]['size'] != 0) {
            if (!empty($_FILES["img"]["name"]) && !$_FILES["img"]['error']) {
                if (in_array($_FILES["img"]['type'], $allowed)) {
                    $image = $prefix . $_FILES["img"]["name"];
                    $file_path = 'storage/Images/' . $image;
                    move_uploaded_file($_FILES["img"]["tmp_name"], $file_path);
                }
            }
        }


        $item = new Product;
        $item->title = $request->input('Title');
        $item->description = $request->input('Description');
        $item->price = $request->input('Price');
        $item->timestamps = false;
        $item->image = $image;
        $item->save();

        return redirect()->route('Admins.products');

    }

}
