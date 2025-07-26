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




}
