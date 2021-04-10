<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    function getFile($filename): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filePath = storage_path()."/files/".$filename;
        return response()->download($filePath);
    }
}
