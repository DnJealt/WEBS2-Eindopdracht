<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CartController extends Controller {

    public function index()
    {
        if(Auth::user())
        {
            return view('cartIndex');
        }
    }

    public function addProduct(Product $productid, $amount)
    {
        //need to check if it works
        $product = array(
          "$productid" => "$amount"
        );

        // Put a key / value pair in the session
        //Session::put('key', 'value');
        Session::put('cart', "$product");
    }

    public function postAddProduct()
    {
        //not checked with
        if (Auth::user()) {
            // Put a key / value pair in the session
            Session::put();

        }
    }

    public function emptyCart()
    {
        //not checked with
        if (Auth::user())
        {
            // Remove all of the items from the session
            Session::flush();
        }
    }

    public function removeProduct(Request $request)
    {
        //not checked with
        if(Auth::user())
        {
            $id = $request->input('');

            // Remove an item from the session
            Session::forget($id);
        }
        return redirect()->back();
    }


}
