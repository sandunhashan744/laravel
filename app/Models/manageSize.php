<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manageSize extends Model
{
    use HasFactory;

    public function category(){

        return $this->belongsTo(related:Category::class, foreignKey:'cat_id');
    }
    public function subcat(){
        return $this->belongsTo(related:SubCat::class, foreignKey:'subCat_id');
    }
    public function product(){
        return $this->belongsTo(related:SubCat::class, foreignKey:'pro_id');
    }
}
