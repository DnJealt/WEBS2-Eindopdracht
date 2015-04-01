<?php namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

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
                $subsubCat = DB::Select("CALL CatogMenu($sc->ctgId)");
                foreach ($subsubCat as $ssc) {
                    array_push($menu, $ssc);
                }
            }
        }
        //echo for the menu's
        //foreach ($menu as $m) {
        //    //var_dump($m);
        //    echo $m->ctgId . ':   :';
        //    echo $m->ctgName . ':   :';
        //    echo $m->ctgSubOf . ':   :';
        //    echo '<br>';
        //}
        return $menu;
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
