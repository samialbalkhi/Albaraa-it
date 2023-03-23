<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodact extends Model
{
    use HasFactory;
    protected $fillable=['id','name','title','price','discount','brand_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function brands()
    {
        return $this->belongsTo(Brand::class,'brand_id'); 
    }

    public function details()
    {
        return $this->hasMany(Detail::class,'prodact_id');
    }

    public function imageprodcus()
    {
        return $this->hasMany(ImageProdcu::class,'prodact_id');
    }
}

