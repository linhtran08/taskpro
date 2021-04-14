<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    public function getFile($filename): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        $filePath = storage_path()."/files/".$filename;
        return response()->download($filePath);
    }

    public function delete(Request $request): \Illuminate\Http\JsonResponse
    {
        //$deleted_files = $request->input('deleted_files');
        $deleted_files = $request->deleted_files;
        DB::table('file_task')
            ->whereIn('id', $deleted_files)
            ->delete();
//            ->update([
//                'in_use' => 0,
//            ]);
        return response()->json(['success'=>"Products Deleted successfully."]);
    }

}
