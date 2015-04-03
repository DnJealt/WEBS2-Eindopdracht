<?php namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use App\Product;

class CategorieController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public static function index()
    {
        $mainCat = DB::Select("CALL CatogMenu(0)");

        $menu = array();
        foreach ($mainCat as $mc) {
            array_push($menu, $mc);
            $subCat = DB::Select("CALL CatogMenu($mc->ctgId)");
            foreach ($subCat as $sc) {
                array_push($menu, $sc);
            }
        }

        return $menu;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function categorieIndex($id)
    {
        $categorie = Categorie::find($id);

        $allProducts = DB::select("CALL ProductOnCategorie($id)");

        if ($categorie->ctgSubOf == 0) {

            $allCatsOf = DB::select("CALL SubCategorie($id)");


            foreach ($allCatsOf as $cat) {
                unset($otherProducts);


                $otherProducts = DB::select("CALL ProductOnCategorie($cat->ctgId)");

                if (!empty($otherProducts)) {
                    foreach ($otherProducts as $op) {
                        array_push($allProducts, $op);
                    }
                }
            }
        }

        if (!empty($allProducts)) {
            return view('productAll', array('products' => $allProducts));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
