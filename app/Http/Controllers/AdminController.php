<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\User;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;



class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('admin.adminIndex');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function createProduct()
	{
		return view('admin.createProduct');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function storeProduct(Request $request) {
        if(Auth::User()){
            if(Auth::User()->role_roleId == 1){

                $destinationPathSmall = '';
                $filenameSmall       = '';
                $destinationPathBig = '';
                $filenameBig      = '';

                    if($request->hasFile('smallFileToUpload')){

                        $file            = $request->file('smallFileToUpload');
                        $destinationPathSmall = public_path().'/img/productimg/';
                        $filenameSmall        = str_random(6) . '_' . $file->getClientOriginalName();
                        $uploadSuccess   = $file->move($destinationPathSmall, $filenameSmall);
                    }

                    if($request->hasFile('bigFileToUpload')){

                        $file            = $request->file('bigFileToUpload');
                        $destinationPathBig = public_path().'/img/productimg/';
                        $filenameBig        = str_random(6) . '_' . $file->getClientOriginalName();
                        $uploadSuccess   = $file->move($destinationPathBig, $filenameBig);
                    }



                $product = new Product();
                $product->prdName = $request->input('prdName');
                $product->prdPrice = $request->input('prdPrice');
                $product->prdSummary = $request->input('prdSummary');
                $product->prdDescription = $request->input('prdDescription');
                $product->prdPicSmall = $filenameSmall;
                $product->prdPicBig = $filenameBig;

                $product->save();



                if ($product) {
                    return Redirect::route('product');
                }
            }
        }



        //TODO - else
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
