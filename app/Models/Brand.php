<?php

namespace App\Models;

use App\Models\Prodact;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable=['id','name','section_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at','section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    public function prodacts()
    {
        return $this->hasMany(Prodact::class,'brand_id');
    }
}

