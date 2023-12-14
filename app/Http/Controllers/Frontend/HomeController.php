<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{

    public function index()
    {
        // Tìm bài hát có ID là 6
        $desiredSong = song::find(6);

        // Kiểm tra xem bài hát có tồn tại hay không
        if ($desiredSong) {
            $songName = $desiredSong->name;
            $audioFile = $desiredSong->source; // Giả sử là tên cột trong database chứa đường dẫn file audio
        } else {
            $songName = "Bài hát không tồn tại";
            $audioFile = null;
        }

        // Lấy tất cả bài hát (nếu bạn cần chúng cho một mục đích khác)
        $song = song::all();

        // Truyền dữ liệu tới view
        return view("frontend.index", [
            'song' => $song,
            'desiredSongName' => $songName,
            'desiredSongAudio' => $audioFile,
        ]);
    }
    public function searchsong(Request $request)
    {
        $songName = $request->input('name');
        
        // Thực hiện tìm kiếm bài hát theo tên
        $song = Song::where('name', 'like', '%' . $songName . '%')->get();
    
        // Kiểm tra xem có bài hát nào được tìm thấy không
        if ($song->isEmpty()) {
            // Nếu không có bài hát, đặt flash message và chuyển hướng về trang index
            Session::flash('message', 'Sorry, no songs found with the name: ' . $songName);
            Session::flash('alert-class', 'alert-warning'); // Add a custom alert class for styling
            return redirect()->route('index');
        }
    
        // Trả về view hiển thị kết quả tìm kiếm
        return view("frontend.search_result", ['song' => $song]);
    }
    
   
}
