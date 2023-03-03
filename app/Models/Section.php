<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $fillable=['id', 'name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    
     
       public function brands()
       {
        return $this ->hasMany(Brand::class,'section_id');
       }
}
