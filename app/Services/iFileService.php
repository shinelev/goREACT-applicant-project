<?php


namespace App\Services;

use Symfony\Component\HttpFoundation\Request;

interface iFileService
{

    public function handleFileUpload(Request $request);

    public function getFilesByUserIdWithPagination($id);

    public function deleteFileFromStorageAndDb($file_id);

    public function getUrlForFileDownload($file_id);

}
