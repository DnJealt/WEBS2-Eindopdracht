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
            }
        }
///////      $stack = [];
////      $stckCount = -1;
////
////      $cats = array();
////
////      foreach ($menu as $m)
////          if (($m->ctgSubOf == 0)) {
////              if (!empty($stack)) {
////                  for ($i = 0; $i < $stckCount; $i++) {
////                      array_push($cats, '</ul>');
////                  }
////                  unset($stack);
////                  $stack = [];
////              }
////              array_push($cats, '<li><a href="{{URL::to(categorie/' . $m->ctgId . ')}}">' . $m->ctgName . '</a></li>');
////              '                   <li><a href="{{URL::to("categorie/$m->ctgId")}}">{{$m->ctgName}}</a></li>'
///////              array_push($stack, $m->ctgId);
////              $stckCount = 0;
////          } else {
////              if ($m->ctgSubOf == $stack[$stckCount]) {
////                  array_push($cats, '<ul><li><a href="{{URL::to(categorie/' . $m->ctgId . ')}}">' . $m->ctgName . '</a></li>');
////                  array_push($stack, $m->ctgId);
////                  $stckCount++;
////              } else {
////                  array_push($cats, '<li><a href="{{URL::to(categorie/' . $m->ctgId . ')}}">' . $m->ctgName . '</a></li>');
////                  array_pop($stack);
////                  array_push($stack, $m->ctgId);
////              }
////          }
////      if ($stckCount != 0) {
////          for ($i = 0; $i < $stckCount; $i++) {
////              array_push($cats, '</ul>');
////          }
////      }
////
////        foreach($cats as $c)
////        {
////            echo "$c";
////            echo '<br>';
////        }
//

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
