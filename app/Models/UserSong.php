<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSong extends Model
{
    protected $table = 'user_song';

    protected $fillable = ['user_id', 'song_id'];

    // Tùy chọn: Bạn có thể bỏ qua timestamp created_at và updated_at nếu không cần
    public $timestamps = false;

    // Mối quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mối quan hệ với Song
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
}

