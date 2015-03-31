<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        //$topProducts = Product::where('prdPrice', '<', 2)->orderBy('prdname', 'desc')->limit(1)->get();
        $topProduct = DB::select("CALL TopProduct()");
        //var_dump($topProduct);

        if($topProduct[0]->id > 0)
        {
            $product = Product::find($topProduct[0]->id);
        }
        else{
            $product = Product::find(1);
        }

        return view('home', array('productSlide'=>$product));
	}

    public function about(){
        return view('about');
    }



}
