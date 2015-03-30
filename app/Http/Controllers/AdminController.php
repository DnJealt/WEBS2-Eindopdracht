<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use App\User;
use Auth;
use Session;



use Illuminate\Http\Request;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
    public function storeProduct() {
        if(Auth::User()){
            if(Auth::User()->role_roleId == 1){

                $destinationPath = '';
                $filename        = '';

                if (Input::hasFile('image')) {
                    $file            = Input::file('image');
                    $destinationPath = public_path().'/img/';
                    $filename        = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess   = $file->move($destinationPath, $filename);
                }


                $product = Product::create(
                    ['name'       => Input::get('name'),
                    'price'       => Input::get('price'),
                    'ingredients' => Input::get('ingredients'),
                    'active'      => Input::get('active'),
                    'path'        => $destinationPath . $filename]);

                if ($product) {
                    return Redirect::route('productSingle', product->id);
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
