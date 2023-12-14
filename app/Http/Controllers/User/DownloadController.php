<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function index(){
        $song = Song::all();
        return view("frontend.details.download",['song' => $song]);
    }
    public function download($id)
    {
        $song = Song::find($id);

        if (!$song) {
            abort(404); // Or handle the case when the song is not found
        }

        $filePath = public_path('uploads/songs/' . $song->source);

        return Response::download($filePath, $song->name . '.mp3');
    }
}
