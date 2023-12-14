<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    use HasFactory;
    protected $table = 'singer';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'image', 'status'];
   

}

