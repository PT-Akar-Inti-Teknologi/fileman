<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getFile(Request $request)
    {
        $path = $request->path;
        return Storage::download($path);
    }

    public function postFile(Request $request)
    {
        $file = $request->attachment;
        $folder = $request->ApplicationID;
        $fileurl = Storage::put($folder, $file);
        return response()->json(['path' => $fileurl, 'message' => 'File uploaded.'], 200);
    }
}
