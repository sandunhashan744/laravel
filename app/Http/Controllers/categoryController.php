<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCat;

class categoryController extends Controller
{

// Save Category
   
    public function saveCat(Request $request){
        
       $category = new Category;

       $category->category=$request->category;       
       $category->save();

       return redirect('category')->with('status','Category Added Successfully...!') ;
    } 

// Save sub-Category
   public function saveSubCat(Request $request){

        $subcat = new SubCat;

        $subcat->SubCat=$request->subcat;
        $subcat->cat_id=$request->category;
      
        $subcat->save();
        return redirect('category')->with('status','Sub-Category Added Successfully...!') ;

   } 

// Delete Category 
   public function deleteCats($catid){

      $scat = SubCat::where('id', $catid) ;

      $scat->delete();

      return redirect('category')->with('status','Deleted Successfully...!') ;

   }

// Update Category 
   public function updateCats($catid){

     // $scat = SubCat::where('id', $catid) ;

     // $scat->delete();

      return redirect('category')->with('status','Deleted Successfully...!') ;

   }  

}
