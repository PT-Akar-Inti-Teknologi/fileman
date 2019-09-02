<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getFile()
    {
        $uuid = $request->input('uuid');
        $file = DB::table('application_files')->select('file_path')->where('uuid', $uuid)->first();
        $path = storage_path($file->file_path);
        return Storage::download($path);


    }

    public function postFile(Request $request)
    {
        $file = $request->file('attachment');
        $folder = $request->input('ApplicationID');
        $fileurl = Storage::put($folder, $file);
        return response()->json(['path' => $fileurl, 'message' => 'File uploaded.'], 200);
    }
}
