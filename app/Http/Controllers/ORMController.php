<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class ORMController extends Controller
{
     // data create/insert--------------------

     public function ORMInsert(Request $request){
          
        $brand=Brand::create($request->input());

        return $brand;

     }

     // data update---------------

     public function ORMUpdate(Request $request){

       // Brand::where('id', $request->id)->update($request->input());

        $brand=Brand::where('id', $request->id)->update($request->input());

        return $brand;

     }
}
