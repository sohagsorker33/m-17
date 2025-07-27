<?php

namespace App\Http\Controllers;

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





}