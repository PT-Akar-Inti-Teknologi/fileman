<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getFile($uuid)
    {
        $file = DB::table('application_files as A')
        ->leftjoin('applications as B', 'B.id', '=', 'A.application_id')
        ->where('A.uuid', $uuid)
        ->select(
            'A.file_name as name',
            'A.file_path as path',
            'B.cst_name as customer',
            )
        ->first();
        $name = strtoupper($file->customer.' - '.$file->name);
        $extn = pathinfo($file->path, PATHINFO_EXTENSION);
        $path = storage_path('app/public/attachment/'.$file->path);
        $headers = [
            'Content-Type' => mime_content_type($path),
        ];
        return Storage::download($path, $name.'.'.$extn, $headers);
    }

    public function postFile(Request $request)
    {
        $file = $request->attachment;
        $folder = $request->ApplicationID;
        $fileurl = Storage::put($folder, $file);
        return response()->json(['path' => $fileurl, 'message' => 'File uploaded.'], 200);
    }
}
