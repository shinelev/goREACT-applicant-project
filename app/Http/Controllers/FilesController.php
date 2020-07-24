<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Auth;

class FilesController extends Controller
{
    public function submit(Request $request) {

        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'tag' => 'required|string',
            'image' => 'mimes:mp4v,mp4,mpg4,pdf,jpg,jpeg|max:4999'
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'_.'.$extension;
            $path = $request->file('image')->storeAs('public/files', $fileNameToStore);
        } else {
            throwException("Can't handle file saving");
        }

        $file = new File;
        $file->name = $request->input('name');
        $file->file = $fileNameToStore;
        $file->description = $request->input('description');
        $file->tag = $request->input('tag');
        $file->user_id = $request->input('user_id');
        $file->type = 'video';
        $file->save();

        return redirect('/home')->with('success', 'File was saved');
    }

    public function getFiles($id) {
        $files = File::all()->where('user_id', null, $id);

        return view('files')->with('files', $files);
    }
}
