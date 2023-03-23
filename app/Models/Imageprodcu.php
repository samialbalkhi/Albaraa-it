<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imageprodcu extends Model
{
    use HasFactory;

    protected $fillable=['image','prodact_id','created_at','updated_at'];

    protected $hidden=['created_at','updated_at'];

    public function prodacts()
    {
        return $this->belongsTo(Prodact::class,'prodact_id');
    }
}
