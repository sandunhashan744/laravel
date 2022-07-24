<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCat;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Routing\ResponseFactory;
use Response;

use App\Models\User;

class loadController extends Controller
{
    //
    public function loadData(){
        
        $data = SubCat::all();
        $data1 = Category::pluck('category','id');

       return view('/admin/category', compact('data','data1')); 
    }

    public function loadProductForm(){

        $cat = Category::pluck('category','id');
       
        $subcat = SubCat::pluck('SubCat','id');
        $product = Product::all();

        return view('/admin/products', compact('cat','subcat','product'));
    }

    public function loadCusDetails(){
        
        $customer=User::all();
        return view('/admin/customer', compact('customer'));
    }

    public function loadProductToindex(){

        $product = Product::all();

        return view('/elegent/index', compact('product'));

    }
    
    public function loadsubcat(Request $request){

       // $catid=Input::get('Catid');
       $catid=$request->Catid;
       
        $subcat=SubCat::where('cat_id',$catid)->get();

        //return response()->json(['subcat'=>$subcat]);
       return response::json($subcat);
    }

}
