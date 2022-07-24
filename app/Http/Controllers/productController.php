<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCat;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\File;

class productController extends Controller
{
    // Insert Product
        
    public function saveProduct(Request $request){
        
        $totQty=($request->s + $request->m + $request->l + $request->xl + $request->s28 +
                    $request->s30 + $request->s32 + $request->s34 + $request->s36);

        $product=new Product;

        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('productimg/' , $filename);
            $product->image=$filename;
        }

        $product->cat=$request->category;
        $product->sub_cat=$request->subcat;
        $product->name=$request->product;
        $product->price=$request->price;
        $product->dis_price=$request->disPrice; 
        $product->description=$request->description;
        $product->size_S=$request->s;
        $product->size_M=$request->m;
        $product->size_L=$request->l;
        $product->size_XL=$request->xl;
        $product->size_28=$request->s28;
        $product->size_30=$request->s30;
        $product->size_32=$request->s32;
        $product->size_34=$request->s34;
        $product->size_36=$request->s36;
        $product->seson_start=$request->stdate;
        $product->seson_end=$request->endate;
        $product->totProQty=$totQty;
    
        $product->save();
        return redirect('product/add')->with('status','New Product Added Successfully...!') ;
    }

    // edit Product
    public function editProduct($proId){

        $product = Product::findOrFail($proId);
        
        return view('admin.editProduct',compact('product'));
    }

    // Update Product
    public function updataProduct(Request $request, $proId){
      //  dd($request);
        $totQty=($request->s + $request->m + $request->l + $request->xl + $request->s28 +
                 $request->s30 + $request->s32 + $request->s34 + $request->s36);
        
        $product = Product::find($proId); 
        
        if($request->hasFile('img')) 
        {
            $path='productimg/'.$product->image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            
            $file = $request->file('img');
            
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('productimg/' , $filename);
            $product->image=$filename;
        }


        $product->name=$request->product;
        $product->price=$request->price;
        $product->dis_price=$request->disPrice; 
        $product->description=$request->description;
        $product->size_S=$request->s;
        $product->size_M=$request->m;
        $product->size_L=$request->l;
        $product->size_XL=$request->xl;
        $product->size_28=$request->s28;
        $product->size_30=$request->s30;
        $product->size_32=$request->s32;
        $product->size_34=$request->s34;
        $product->size_36=$request->s36;
        $product->totProQty=$totQty;
        $product->seson_start=$request->stdate;
        $product->seson_end=$request->endate;

        $product->update();

        return redirect('product')->with('status','Product Updated Successfully...!') ;
    }

    // Delete Product 
    public function deleteProduct($productId){

        $product = Product::find($productId);
        $path='productimg/'.$product->image;
        
        if(File::exists($path)){

            File::delete($path);
        }

        $product->delete();

        return redirect('product')->with('status','Product Deleted Successfully...!') ;
    }

    //New Product Page
    public function addnewproduct(){
        
        //$cat = Category::pluck('category','id');  
        $cat = Category::all();
        $subcat = SubCat::pluck('SubCat','id');

        //return view('/admin/products', compact('cat','subcat','product'));
        return view('admin/addProduct', compact('cat','subcat'));
    }

}

