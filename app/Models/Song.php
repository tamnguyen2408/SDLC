<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $table = 'song';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'category_id', 'source'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function user()
{
    return $this->belongsToMany(Song::class, 'user_song')
            ->withTimestamps();
}
   
}
