<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCat;
use App\Models\Product;
use App\Models\manageSize;

class sizeManageController extends Controller
{
    public function loadCat_to_sizeManage(){

        $cate = Category::pluck('category','id');
        $subcat = SubCat::pluck('SubCat','id');
        $product = Product::pluck('name','id');

        $sizeMana =  manageSize::all();

        return view('admin.size-manage',compact('cate','subcat','product','sizeMana'));
    }

// Save Data
    public function saveSizeDetails(Request $request){

        $size = new manageSize;
        
        $size->pro_id=$request->pname;
        $size->cat_id=$request->category;
        $size->Subcat_id=$request->SubCat;
        $size->size_lbl=$request->size;
        $size->chest=$request->chst;
        $size->sholder=$request->sholder;

        $size->save();

        return redirect('admin/size-manage')->with('status','Added Successfully...!') ;  
    }

// edit Product
    public function editSize($sizeid){

        $product = manageSize::findOrFail($sizeid);
        dd($product);
        return view('admin/size-manage',compact('product'));
    }

//Update
    public function UpdateSize($sizeid){
            
        $sizeManage = manageSize::where('id',$sizeid);

        $sizeManage->update();
        return redirect('admin/size-manage')->with('status','Update Successfully...!') ;  
    }

// Delete Size

    public function deleteSize($sizeid){
        
        $sizeManage = manageSize::where('id',$sizeid);
        $sizeManage->delete();
        return redirect('admin/size-manage')->with('status','Deleted Successfully...!') ;  
    }



}
