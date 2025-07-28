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

       //return Brand::where('id', $request->id)->update($request->input());

        $brand=Brand::where('id', $request->id)->update($request->input());

        return $brand;

     }

     // UpdateOrCreate ----------------

    public function ORMUpdateOrCreate(Request $request){

     return  Brand::updateOrCreate(
          
          ["brandName"=>$request->brandName],

          $request->input()

         );

    }

     public function Delete(Request $request){
         
       return Brand::where('id', $request->id)->delete();

     }

     // akta table all select

     public function AllSelect(Request $request){
       
       // return Brand::all();

        return Brand::get();

     }

     public function Find(Request $request){
       
        //return Brand::first();

       // return Brand::find(2);

       return Brand::where('id', $request->id)->get();
         
     }

     public function RandomSelect(Request $request){

        return Brand::inRandomOrder()->get();
         
     }

     public function Pluck(Request $request){

       return Brand::pluck(
        
            'brandName',
            'brandImg'
        
       );

     }

    

        
    }





