<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $topProducts = Product::where('prdPrice', '<', 2)->orderBy('prdname', 'desc')->limit(1)->get();
        $topProduct = Product::raw("SELECT DISTINCT(COUNT(product_prdId)) AS result, product_prdId FROM cart GROUP BY product_prdId ORDER BY result DESC limit 1");

        return view('home', array('productSlide'=>$topProduct));
	}

    public function about(){
        return view('about');
    }



}
