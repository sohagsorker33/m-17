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


}