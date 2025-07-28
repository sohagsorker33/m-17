<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
 
 // full table select kora niya aser jonno ------------
    public function tableSelect(Request $request){
       
       $products=DB::table('products')->get();

       return $products;

    } 
//  specific akta row select kora niya aser jonno -------------


 public function tableSpecificSelect(Request $request){
    $brands=DB::table('brands')->find(1);
    return $brands;
 }
 // specific akta row a akta data select kora niya aser jonno ------------

 public function tableSpecificDataSelect(Request $request){
    $brands=DB::table('brands')->pluck('brandImg','brandName');

    return $brands;
 }

// aggregates------------------------ 

public function Aggregates(Request $request){
     
   $count=DB::table('products')->count();

   $max=DB::table('products')->max('price');

   $min=DB::table('products')->min('price');

   $sum=DB::table('products')->sum('price');

   $avg=DB::table('products')->avg('price');

   return $avg;


}

// select cluses---------------------
public function select(Request $request){

     $select = DB::table('products')

            ->select('title', 'price', 'short_des')

            ->get();

      $distinct = DB::table('products')->select('title')

            ->distinct()

            ->get();

      return $distinct;
}

// Inner Join ----------------------------

public function innerJoin(Request $request){
 
  $products = DB::table('products')

  /*  ->join('categories', 'products.category_id', '=', 'categories.id')

    ->join('brands', 'products.brand_id', '=', 'brands.id')

    ->get();
 */

    ->join('categories', 'products.category_id', '=', 'categories.id')

    ->join('brands', 'products.brand_id', '=', 'brands.id')

    ->where('products.id', 2)

    ->get();

    return $products;    

}

// left and right Join ----------------------------

public function leftRightJoin(Request $request){
 
   //  left join-------------

  $productLeft=DB::table('products')

  ->leftJoin('categories', 'products.category_id', '=', 'categories.id')

  ->leftJoin('brands', 'products.brand_id', '=', 'brands.id')

  ->get();
 
   // right join------------

     $productRight=DB::table('products')

    ->rightJoin('categories', 'products.category_id', '=', 'categories.id')

    ->rightJoin('brands', 'products.brand_id', '=', 'brands.id')
    
    ->get();

 

  return $productRight;

}


// cross Join ----------------------------

public function crossJoin(Request $request){

   $product=DB::table('products')
   
   ->crossJoin('brands')

   ->crossJoin('categories')
   
   ->get();
   
   return $product;
   
}


// advanced joincluse --------

public function advancedJoinCluse(Request $request){

   $products=DB::table('products')

   ->join('categories', function(JoinClause $join){
    
      $join->on('products.category_id', '=', 'categories.id') 

      ->where('products.price', '>', 500);

   })
   
   ->join('brands', function(JoinClause $join){

      $join->on('products.brand_id','=', 'brands.id')

      ->where('brands.brandName', '=', 't-shrat');

   })->get();
 
   return $products;

}

// Union------------

public function union(Request $request){

   $query1=DB::table('products')->where('products.price', '>', 2000);

   $query2=DB::table('products')->where('products.discount', '=', 1);

   $product=$query1->union($query2)->get();

   return $product;

}

// ascending and descendion order-----------------

public function ascDesc(Request $request){

  $asc=DB::table('products')->orderBy('price','asc')->get();

  $desc=DB::table('products')->orderBy('title', 'desc')->get();

  $random=DB::table('products')->inRandomOrder()->get();

  $skip=DB::table('products')->skip(1)->take(1)->get();

  return $skip;

}

// GroupBy------

public function groupBy(Request $request){

   $groupBy=DB::table('products')->groupBy('title')->get();

   $groupBy2=DB::table('products')->groupBy('price')->having('price', '>=', 100)->get();

   return $groupBy2;


}

// data insert------------

public function Insert(Request $request){

   $brands=DB::table('brands')->insert($request->input());

   return $brands;

}

// data update------------
public function Update(Request $request)
{
   
    $update = DB::table('brands')->where('id',$request->id)->update($request->input());

    return $update;
}

 public function Delete(Request $request){

  $delete=DB::table('brands')->where('id', $request->id)->delete();

  return $delete;

 }


}