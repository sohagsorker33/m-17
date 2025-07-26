<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DemoController extends Controller
{
/*************  ✨ Windsurf Command ⭐  *************/
/*******  100a2ce2-8f56-4614-8ddc-e99f2e5defa3  *******/


 // table select kora niya aser jonno ------------
    public function tableSelect(Request $request){
       
       $products=DB::table('products')->get();
       return $products;

    } 





    
}
