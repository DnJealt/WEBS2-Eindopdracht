<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\User;
use App\Categorie;

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
        $categories = Categorie::all();

		return view('admin.createProduct', array('categories'=>$categories));
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
                $product->categorie_ctgId = $request->input('categorie');


                $product->save();




                if ($product) {
                    return Redirect::to('CMS/updateProduct');
                }
            }
        }
    }

    public function updateProduct(){
        $products = Product::all();
        return view('admin.updateProductIndex', array('products'=>$products));
    }

    public function getUpdateProduct($id){
        $product = Product::find($id);
        $categories = Categorie::all();

        return view('admin.updateProduct', array('product'=>$product, 'categories'=>$categories));
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function postUpdateProduct(Request $request, $id){
        if(Auth::User()){
            if(Auth::User()->role_roleId == 1) {

                $destinationPathSmall = '';
                $filenameSmall       = '';
                $destinationPathBig = '';
                $filenameBig      = '';

                $product = Product::find($id);

                if($request->hasFile('smallFileToUpload')){

                    $file            = $request->file('smallFileToUpload');
                    $destinationPathSmall = public_path().'/img/productimg/';
                    $filenameSmall        = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess   = $file->move($destinationPathSmall, $filenameSmall);


                    $product->prdName = $request->input('prdName');
                    $product->prdPrice = $request->input('prdPrice');
                    $product->prdSummary = $request->input('prdSummary');
                    $product->prdDescription = $request->input('prdDescription');
                    $product->categorie_ctgId = $request->input('categorie');
                    $product->prdPicSmall = $filenameSmall;
                }

                if($request->hasFile('bigFileToUpload')){

                    $file            = $request->file('bigFileToUpload');
                    $destinationPathBig = public_path().'/img/productimg/';
                    $filenameBig        = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploadSuccess   = $file->move($destinationPathBig, $filenameBig);



                    $product->prdName = $request->input('prdName');
                    $product->prdPrice = $request->input('prdPrice');
                    $product->prdSummary = $request->input('prdSummary');
                    $product->prdDescription = $request->input('prdDescription');
                    $product->categorie_ctgId = $request->input('categorie');
                    $product->prdPicBig = $filenameBig;
                }
                else{

                    $product->prdName = $request->input('prdName');
                    $product->prdPrice = $request->input('prdPrice');
                    $product->prdSummary = $request->input('prdSummary');
                    $product->prdDescription = $request->input('prdDescription');
                    $product->categorie_ctgId = $request->input('categorie');

                }
                $product->save();
            }
        }
        return Redirect::to('CMS/updateProduct');
    }

    public function deleteProduct($id)
    {
        if (Auth::User()) {
            if (Auth::User()->role_roleId == 1) {

                $product = Product::find($id);

                $product->delete();
            }
        }
        return Redirect::to('CMS/updateProduct');
    }

    public function createCategory(){

        $baseCategories = Categorie::where('ctgSubOf','=', 0)->get();

        return view('admin.createCategory', array('baseCats'=>$baseCategories));

    }

    public function storeCategory(Request $request){
        if (Auth::User()) {
            if (Auth::User()->role_roleId == 1) {

                $category = new Categorie();
                $category->ctgName = $request->input('ctgName');
                $category->ctgSubOf = $request->input('subCatOf');

                $category->save();

                return Redirect::to('/');

            }
        }
        else{
            return Redirect::to('/');
        }

    }

    public function updateCategory(){

        $categories = Categorie::all();

        return view('admin.updateCategoryIndex', array('categories'=>$categories));
    }




}
