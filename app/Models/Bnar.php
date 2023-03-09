<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bnar extends Model
{
    use HasFactory;
    protected $fillable=['image','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}
