<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    function getFile($filename): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filePath = public_path()."/resources/images/file/JAVA2.pdf";
        return response()->download($filePath);
    }
}
