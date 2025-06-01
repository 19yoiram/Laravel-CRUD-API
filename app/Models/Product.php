<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'image', 'detail'];


    //  public function scopeSearch($query, $search) {

    //     if($search != null) {
    //        return $query->where("name","like","%$search%")->orWhere("detail","like","%$search%");
    //     }
    // }
}
