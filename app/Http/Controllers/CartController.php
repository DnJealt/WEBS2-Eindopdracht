<?php namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
use App\Product;
use App\Cart;

class CartController extends Controller
{

    public function index()
    {
        $product = array();
        $amount = array();
        if (Auth::user()) {

            $SessionItems = Session::get('cart', []);

            $count = 0;
            foreach ($SessionItems as $item) {
                if ($item['item_amount'] > 0) {
                    $count++;
                    //echo 'num +: : :';
                    //var_dump($item);
                    //$int = $item['item_id'];
                    $product[] = Product::find($item['item_id']);
                    // var_dump($product);
                    //$amount = $item['item_amount'];
                    // echo ':: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: :: ';
                    array_push($amount, $item['item_amount']);
                    //var_dump($item['item_amount']);
                }
            }
            if ($count == 0) {
                Session::forget('cart');
            }

            //$items = array('product' => $product,
            //    'product_amounts' => $amount);

            //var_dump($amount);
            return view('cartIndex', array('products' => $product, 'amounts' => $amount));
        }
//        return redirect()->back();
    }

    public function emptyCart()
    {
        // Remove all of the items from the session
        Session::forget('cart');
        return redirect('showSession');
    }

    public function showSession()
    {
        var_dump(Session::all());
    }

    public function removeFromCart(Request $request, $id)
    {
        //not checked with
        $items = Session::get('cart', []);
        //echo "$id :  :";
        if (!empty($items)) {

            //echo 'kom ik hier cart session:  :';
            foreach ($items as &$item) {
                if ("$id" == $item['item_id']) {

                    // echo 'product wel in cart session:  :';
//
                    //echo 'product wel in cart session: loop :  :';
//                    var_dump($item['item_id']);
//
                    //echo 'product gevonden in cart session: loop :  :';
//
                    if ($request->input("$id") == 'remove from cart') {
//
                        var_dump($item);
                        //echo 'product gevonden add -1 :  :';
//                        Session::forget($id);
                        $item['item_amount']--;

                        var_dump($item);
                        //echo 'product amount subtracted correctly:  :';
                        //var_dump($items);

                        Session::put('cart', $items);
                    }
                }
            }
        }
        return redirect()->back();
    }

    public function addToCart(Request $request, $id)
    {
        $items = Session::get('cart', []);
        //echo "$id :  :";
        if (!empty($items)) {

            // echo 'kom ik hier cart session:  :';
            foreach ($items as &$item) {
                if ("$id" == $item['item_id']) {

                    //echo 'product wel in cart session:  :';
//
                    //echo 'product wel in cart session: loop :  :';
//                    var_dump($item['item_id']);
//
                    //echo 'product gevonden in cart session: loop :  :';
//
                    if ($request->input("$id") == 'add to cart') {
//
                        //var_dump($item);
                        //echo 'product gevonden add +1 :  :';
//                        Session::forget($id);
                        $item['item_amount']++;

                        //var_dump($item);
                        //echo 'product amount added correctly:  :';
                        //var_dump($items);

                        Session::put('cart', $items);
                        return redirect()->back();
                    }
                }
            }
            //echo 'product niet in cart session:  :';

            $items = array('item_id' => "$id",
                'item_amount' => 1);
        } else {
            //echo 'kom ik hier lege cart session:  :';

            $items = array('item_id' => "$id",
                'item_amount' => 1);
            //echo 'item added to empty cart:  : ';
        }

        Session::push('cart', $items);
        //       echo 'Session check:  :';
        return redirect()->back();
    }

    public function checkout()
    {
        if (Auth::check()) {
            $product = array();
            $amount = array();

            $items = Session::get('cart', []);
            if (!empty($items)) {
                $userId = Auth::User()->usrId;
                foreach ($items as &$item) {
                    $product = $item['item_id'];
                    $amount = $item['item_amount'];

                    $cart = new Cart;
                    $cart->user_usrId = $userId;
                    $cart->product_prdId = $product;
                    $cart->crtProductAmount = $amount;
//                    $cart->save(); //moet uncomment worden om de producten in de db cart te saven
                }

                $dbProducts = DB::select("CALL MyCart($userId)");

               //$dbGet = array();
                foreach ($dbProducts as $i) {
                    $dbGet[] = Product::find($i->id);
                    $newAmount[] = $i->amount;
                }
               // var_dump($newAmount);

                return view('checkout', array('products' => $dbGet, 'amounts' => $newAmount));
            }
        }
        return redirect('/');
    }

    public function betaald()
    {
        if(Auth::check())
        {
            return View('paid');
        }
        return Redirect('/');
    }



}
