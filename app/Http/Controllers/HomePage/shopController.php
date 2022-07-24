<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCat;
use App\Models\manageSize;

class shopController extends Controller
{
    // Load Shop Data 
    function shopPage($id){

        $data=Product::where('cat',$id)->get()->sortDesc();
        $subcat=SubCat::where('cat_id',$id)->get();

        return view('elegent.shop',compact('data','subcat'));
    }

    // Load Subcat Data 
    function suctategory($catid,$subid){

        $data=Product::where('sub_cat',$subid)->where('cat',$catid)->get()->sortDesc();
       
        $subcat=SubCat::where('cat_id',$catid)->get();

        return view('elegent.shop',compact('data','subcat'));
    }
    
    // Find the Relavent Size
    function findSize(Request $request){

        $sholdersize=$request->input('findsize');
        $cat=$request->input('catid');

        $sizefound = manageSize::select('size_lbl')->where('sholder',$sholdersize)->where('cat_id',$cat)->first();
        
        return response()->json($sizefound);
    }    
}
