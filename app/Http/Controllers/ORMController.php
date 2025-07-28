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
}
