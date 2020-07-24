<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FilesController extends Controller
{
    public function submit(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        $file = new File;
        $file->file_name = $request->input('name');
        $file->file_type = '$request->input()';
        $file->file_name_saved = $request->input('name');
        $file->description = $request->input('description');
        $file->user_id = '1';
        $file->save();

        return redirect('/home')->with('success', 'File was saved');
    }

    public function getFiles() {
        $files = File::all();

        return view('files')->with('files', $files);
    }
}
