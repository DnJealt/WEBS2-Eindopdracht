<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Session;

class CartController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
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
//        if (Auth::user())
//        {
        // Remove all of the items from the session
        Session::flush();
//        }

        return redirect()->back();
    }

    public function showSession()
    {
        var_dump(Session::all());
    }

    public function removeProduct(Request $request)
    {
        //not checked with
        if (Auth::user()) {
            $id = $request->input('');

            // Remove an item from the session
            Session::forget($id);
        }
        return redirect()->back();
    }

    public function addToCart(Request $request, $id)
    {
        $items = Session::get('cart', []);
        echo "$id :  :";
        if (!empty($items)) {

            echo 'kom ik hier cart session:  :';
            foreach ($items as &$item) {
                if ("$id" == $item['item_id']) {

                    echo 'product wel in cart session:  :';
//
                    echo 'product wel in cart session: loop :  :';
//                    var_dump($item['item_id']);
//
                    echo 'product gevonden in cart session: loop :  :';
//
                    if ($request->input("$id") == 'add to cart') {
//
                        var_dump($item);
                        echo 'product gevonden add +1 :  :';
//
                        $item['item_amount']++;
                        var_dump($item);
                        echo 'product amount added correctly:  :';
                        //var_dump($items);
                        break;
                    }
                }
            }
            echo 'product niet in cart session:  :';

            $items = array('item_id' => "$id",
                'item_amount' => "1");
        } else {
            echo 'kom ik hier lege cart session:  :';

            $items = array('item_id' => "$id",
                'item_amount' => "1");
            echo 'item added to empty cart:  : ';
        }

        Session::push('cart', $items);
        //       echo 'Session check:  :';
        return redirect()->back();
    }

}
