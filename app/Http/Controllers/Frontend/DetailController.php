<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Song;
use App\Models\UserSong;
use Illuminate\Support\Facades\Session;

class DetailController extends Controller
{
    public function index(Request $request)
    {
        $idSong = $request->id;
        $idSong = is_numeric($idSong) ? $idSong : 0;
        $infoSong = Song::with('category')->find($idSong);
    
        if (!$infoSong) {
            return abort(404);
        }
    
        return view('frontend.details.index', ['info' => $infoSong]);
    }
    
    public function download(Request $request)
    {
        if($request->session()->has('username')){
            // duoc download - vi da dang nhap
        } else {
            return redirect()->back()->with('error_download', 'Ban can dang nhap de download');
        }
    }
    


    // DetailController.php
//     public function downloadsong(Request $request, $id)
// {
//     // Assuming you have a direct relationship between User and Song
//     $user = auth()->user();
//     $song = Song::find($id);

//     // Check if the user is authenticated
//     if (!$user) {
//         // Set a session message to inform the user to log in
//         Session::flash('error_download', 'Bạn cần đăng nhập để tải nhạc.');
        
//         // Redirect to the login page
//         return redirect()->route('user.login');
//     }

//     // Check if the song exists
//     if (!$song) {
//         return abort(404); // Or handle appropriately
//     }

//     // Check if the user has permission to download the song using the user_song table
//     $userSong = UserSong::where('user_id', $user->id)
//                         ->where('song_id', $song->id)
//                         ->first();

//     // Check if the user has permission
//     if (!$userSong) {
//         return redirect()->route('index')->with('error_download', 'Bạn không có quyền tải nhạc này.');
//     }

//     // Proceed with the download
//     $fileName = $song->source;
//     $filePath = public_path('uploads/songs/' . $fileName);

//     return response()->download($filePath, $fileName);
// }
}