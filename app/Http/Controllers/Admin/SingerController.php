<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostSingerRequest;
use App\Http\Requests\UpdatePostSingerRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SingerController extends Controller
{
    public function index()
    {

        $allSinger = DB::table('singer')->where('deleted_at', null)->get();
        return view("singer.index", ['singers' => $allSinger]);
    }
    public function create()
    {
        $singers = Singer::all();
        return view("singer.add", ['singers' => $singers]);
    }

    public function handleCreate(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required',
            'status' => 'numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ];

        // Validation messages
        $messages = [
            'name.required' => 'The name field is required.',
            'status.numeric' => 'The status field must be a number.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be of type: jpeg, png, jpg, gif.',
        ];

        // Validate the request
        $request->validate($rules, $messages);

        $nameImage = null;
        $upload = null;

        // Handle image upload
        if ($request->hasFile('image')) {
            $nameImage = $request->image->getClientOriginalName();
            if ($request->file('image')->isValid()) {
                // File has no errors
                $upload = $request->file('image')->move('uploads/image', $nameImage);
            }
        }

        // Insert data into the database
        $insert = DB::table('singer')->insert([
            'id' => $request->id,
            'name' => $request->name,
            'information' => $request->information,
            'image' => $nameImage,
            'status' => $request->status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
            'deleted_at' => null,
        ]);

        // Redirect based on the result of the insert
        if ($insert) {
            return redirect()->route('admin.singer')->with('add-singer', 'Add singer successfully');
        } else {
            return redirect()->back()->with('add-singer', 'Add singer failure');
        }
    }


    public function edit(Request $request)
    {
        $idSinger = $request->id;
        $nameSinger = $request->name;
        $in4Singer = $request->information;
        $idSinger = is_numeric($idSinger) ? $idSinger : 0;
        $infoSinger = DB::table('singer')->where('id', $idSinger)->first();
        if (empty($infoSinger)) {
            return view('error');
        } else {
            $singers = Singer::all();
            return view('singer.edit', ['singers' => $singers, 'singer' => $infoSinger]);
        }
    }

    public function handleEdit(Request $request)
    {
        $idSinger = $request->id;
        $idSinger = is_numeric($idSinger) ? $idSinger : 0;
        $infoSinger = DB::table('singer')->where('id', $idSinger)->first();
        if (empty($infoSinger)) {
            return redirect()->back()->with('update-singer', 'Update singer Failure');
        } else {
            $oldSingerImage = $infoSinger->image;
        }
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                // file ko co loi
                $extensionImage = $request->image->getClientOriginalExtension();
                if ($extensionImage === 'png' || $extensionImage === 'jpg' || $extensionImage === 'jpeg') {
                    $oldSingerImage = $request->image->getClientOriginalName();
                    $request->file('image')->move('uploads/images', $oldSingerImage);
                } else {
                    return redirect()->back()->with('update-singer', 'Update singer Failure - error image of singer');
                }
            }
        }

        // update
        $update = DB::table('singer')
            ->where('id', $idSinger)
            ->update([
                'name' => $request->name,
                'information' => $request->information,
                'image' => $oldSingerImage,
                'status' => $request->status,
                'updated_at' => now(),
            ]);
        if ($update) {
            return redirect()->route('admin.singer')->with('update-singer', 'Update singer successfully');
        } else {
            return redirect()->back()->with('update-singer', 'Update singer Failure');
        }
    }

    public function delete(Request $request)
    {
        $idSinger = $request->id;
        $idSinger = is_numeric($idSinger) ? $idSinger : 0;
        $del = DB::table('singer')->where('id', $idSinger)->update(['deleted_at' => date('Y-m-d H:i:s')]);
        if ($del) {
            return redirect()->route('admin.singer')->with('delete-singer', 'Delete singer successfully');
        }
        return redirect()->route('admin.singer')->with('delete-singer', 'Delete singer failure');
    }
}
