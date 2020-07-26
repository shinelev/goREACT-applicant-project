<?php

namespace App\Http\Controllers;

use App\Services\iFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Type;

class FilesController extends Controller
{
    private $fileService;

    /**
     * FilesController constructor.
     * @param $fileService
     */
    public function __construct(iFileService $fileService)
    {
        $this->fileService = $fileService;
    }


    public function upload(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'tag' => 'required|string',
            'image' => 'mimes:mp4v,mp4,mpg4,pdf,jpg,jpeg|max:4999'
        ]);

        $this->fileService->handleFileUpload($request);

        return redirect('/home')->with('success', 'File was saved');
    }

    public function getFiles($id)
    {
        if (Auth::user()->id == $id) {
            $files = $this->fileService->getFilesByUserIdWithPagination($id);
            return view('files', ['files' => $files]);
        }

        return view('welcome');
    }

    public function delete($file_id, Request $request)
    {
        $user_id = $request->input('user_id');

        if (Auth::user()->id == $user_id) {
            $this->fileService->deleteFileFromStorageAndDb($file_id);
            return $this->getFiles($user_id);
        }

        return view('welcome');
    }

    public function downloadFile($file_id, Request $request)
    {
        $user_id = $request->input('user_id');

        if (Auth::user()->id == $user_id) {
            $url = $this->fileService->getUrlForFileDownload($file_id);
            return response()->download(public_path() . $url);
        }

        return view('welcome');
    }
}
