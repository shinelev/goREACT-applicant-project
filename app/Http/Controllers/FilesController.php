<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Type;

class FilesController extends Controller
{
    public function submit(Request $request)
    {

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
            $fileNameToStore = $fileName . '.' . $extension;
            $path = $request->file('image')->storeAs('public', $fileNameToStore);
        } else {
            throwException("Can't handle file saving");
        }

        $file = new File;
        $file->name = $request->input('name');
        $file->file = $fileNameToStore;
        $file->description = $request->input('description');
        $file->tag = $request->input('tag');
        $file->user_id = $request->input('user_id');
        $file->type = Type::getType($extension);
        $file->save();

        return redirect('/home')->with('success', 'File was saved');
    }

    public function getFiles($id)
    {
        $files = File::where('user_id', '=', $id)->paginate(5);
        return view('files', ['files' => $files]);
    }

    public function delete($file_id, Request $request)
    {
        $user_id = $request->input('user_id');
        $file = File::where('id', $file_id)->first();
        $url = Storage::url($file->file);
        unlink(public_path() . $url);
        File::destroy($file->id);

        return $this->getFiles($user_id);
    }

    public function downloadFile($file_id, Request $request)
    {
        $file = File::where('id', $file_id)->first();
        $user_id = $request->input('user_id');
        $url = Storage::url($file->file);

        if (Auth::user()->id == $user_id || Auth::user()->id == $file->user_id) {
            return response()->download(public_path() . $url);
        }
    }
}
