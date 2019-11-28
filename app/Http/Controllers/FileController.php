<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function getFile(Request $request)
    {
        $uuid = $request->uuid;
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
        $headers = [
            'Content-Type' => mime_content_type($path),
        ];
        return Storage::download($file->path, $name.'.'.$extn, $headers);
    }

    public function postFile(Request $request)
    {
        $dir = $request->ApplicationID;
        $newImage = $request->file('newImage');
        $oldImage = $request->oldImage;
        $filepath = Storage::putFile($dir, $newImage);
        if($oldImage)
        {
            if (file_exists(storage_path('app/public/attachment/'.$oldImage)))
            {
                unlink(storage_path('app/public/attachment/'.$oldImage));
            }
        }
        return response()->json(['path' => $filepath, 'message' => 'File uploaded.'], 200);
    }

}
