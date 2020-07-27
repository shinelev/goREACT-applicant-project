<?php


namespace App\Services;

use App\File;
use App\Common\Type;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class FileService implements iFileService
{

    public function handleFileUpload(Request $request)
    {

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
    }

    public function getFilesByUserIdWithPagination($id)
    {
        return File::where('user_id', '=', $id)->paginate(5);
    }

    public function deleteFileFromStorageAndDb($file_id)
    {
        $file = File::where('id', $file_id)->first();
        $url = Storage::url($file->file);
        unlink(public_path() . $url);
        File::destroy($file->id);
    }

    public function getUrlForFileDownload($file_id)
    {
        $file = File::where('id', $file_id)->first();
        return Storage::url($file->file);
    }
}
