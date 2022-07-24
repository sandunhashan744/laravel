<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCat;

class homepageController extends Controller
{
    // Search Products

    function productlistAjax (){
        $product = Product::select('name')->get();
        $data = [];
        
        foreach($product as $item){
            $data[]= $item['name'];
        }
        return $data;
    }

    function productSearch (Request $request){
        
        $searchPro = $request->input('sarchPro');
        
        if($searchPro != '')
        {
            $product= Product::where("name","LIKE","%$searchPro%")->first();
            if($product){
                return redirect('single-product/show/'.$product->id);
            }
            else
            {
                return redirect()->back()->with("status","No Product Matched..!");
            }
        }
        else{
            return redirect()->back();
        }
    }

    // Fetch the new Products to Home Page

    public function loadProducts(){
        
        $newProducts=Product::orderBy('id', 'DESC')->get();
        $product = Product::all();
        $randProduct=Product::all()->random(4);

        $date=date('Y-m-d'); 
        $startDate=Product::select('seson_start')->get();
        $enddate=Product::select('seson_end')->get();
        $data = array();

        foreach($product as $products){
            if($date >= $products->seson_start && $date <= $products->seson_end){
                $data[] = array(
                    "id" => $products->id,
                    "name" => $products->name,
                    "price" => $products->price,
                    "dis_price" => $products->dis_price,
                    "image" => $products->image,

                );
            }
        }
       // dd($data);

        return view('/elegent/index',compact('newProducts','product','randProduct','data'));
    }

}
