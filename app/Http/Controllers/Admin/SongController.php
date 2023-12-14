<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostSongRequest;
use App\Http\Requests\UpdatePostSongRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    public function index()
    {
        $allSong = DB::table('song')->where('deleted_at',null)->get();
        return view("song.index",['songs' => $allSong]);
    }

    public function create()
    {
        $categories = Category::all();
        return view("song.add", ['categories' => $categories]);
    }

    public function handleCreate(StorePostSongRequest $request)
    {
        // tien hanh upload file
        $nameFile = null;
        $upload = null;
        if($request->hasFile('source')){
            $nameFile = $request->source->getClientOriginalName();
            if($request->file('source')->isValid()){
                // file ko co loi
                $upload = $request->file('source')->move('uploads/songs',$nameFile);
            }
        }
        $namePoster = null;
        if($request->hasFile('poster_music')){
            $namePoster = $request->poster_music->getClientOriginalName();
            if($request->file('poster_music')->isValid()){
                // file ko co loi
                $request->file('poster_music')->move('uploads/images',$namePoster);
            }
        }

        $insert = DB::table('song')->insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'lyric' => $request->lyric,
            'poster_music' => $namePoster,
            'source' => $nameFile,
            'type' => 1,
            'quality' => null,
            'duration' => null,
            'price' => $request->price,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
            'deleted_at' => null
        ]);
        if($insert){
            return redirect()->route('admin.song')->with('add-song', 'add song successfully');
        } else {
            return redirect()->back()->with('add-song', 'add song failure');
        }
    }

    public function edit(Request $request)
    {
        $idSong = $request->id;
        $idSong = is_numeric($idSong) ? $idSong : 0;
        $infoSong = DB::table('song')->where('id',$idSong)->first();
        if(empty($infoSong)){
            return view('error');
        } else {
            $categories = Category::all();
            return view('song.edit',['categories' => $categories, 'song' => $infoSong]);
        }
    }

    public function handleEdit(UpdatePostSongRequest $request)
    {
        $idSong = $request->id;
        $idSong = is_numeric($idSong) ? $idSong : 0;
        $infoSong = DB::table('song')->where('id',$idSong)->first();
        if(empty($infoSong)){
            return redirect()->back()->with('update-song', 'Update song Failure');
        } else {
            $oldSongSource = $infoSong->source;
            $oldSongPoster = $infoSong->poster_music;
            // neu nguoi dung co thay doi lai bai hat moi
            if($request->hasFile('source')){
                if($request->file('source')->isValid()){
                    // file ko co loi
                    $extensionSong = $request->source->getClientOriginalExtension();
                    if($extensionSong !== 'mp3' && $extensionSong !== 'mp4'){
                        return redirect()->back()->with('update-song', 'Update song Failure - error source of song');
                    } else {
                        $oldSongSource = $request->source->getClientOriginalName();
                        $request->file('source')->move('uploads/songs',$oldSongSource);
                    }
                }
            }
            // neu nguoi dung co thay doi anh poster
            if($request->hasFile('poster_music')){
                if($request->file('poster_music')->isValid()){
                    // file ko co loi
                    $extensionPoster = $request->poster_music->getClientOriginalExtension();
                    if($extensionPoster === 'png' || $extensionPoster === 'jpg' || $extensionPoster === 'jpeg'){
                        $oldSongPoster = $request->poster_music->getClientOriginalName();
                        $request->file('poster_music')->move('uploads/images',$oldSongPoster);
                    } else {
                        return redirect()->back()->with('update-song', 'Update song Failure - error poster of song');
                    }
                }
            }
            // update
            $update = DB::table('song')
                ->where('id',$idSong)
                ->update([
                    'name' => $request->name,
                    'source' => $oldSongSource,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'status' => $request->status,
                    'poster_music' => $oldSongPoster,
                    'lyric' => $request->lyric,
                    'slug' => Str::slug($request->name),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            if($update){
                return redirect()->route('admin.song')->with('update-song', 'Update song successfully');
            } else {
                return redirect()->back()->with('update-song', 'Update song Failure');
            }
        }
    }
    public function delete(Request $request)
    {
        $idSong = $request->id;
        $idSong = is_numeric($idSong) ? $idSong : 0;
        $del = DB::table('song')->where('id',$idSong)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if($del){
            return redirect()->route('admin.song')->with('delete-song','Delete song successfully');
        }
        return redirect()->route('admin.song')->with('delete-song','Delete song failure');
    }
}

