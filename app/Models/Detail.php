<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable=['id','details','prodact_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}
