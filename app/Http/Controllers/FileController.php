<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{
    public function index()
    {
        // $data = request()->session()->all();
        return \Ses;
        // return 'CUmi';
        // $file = DB::table('application_files')->select('file_path')->where('uuid', $uuid)->first();
        // $path = storage_path('app/'.$file->file_path);
        // // return response()->download($path);
        // return response()->json(['message'=>$file], 200);

    }

    public function getFile($uuid)
    {
        $file = DB::table('application_files')->select('file_path')->where('uuid', $uuid)->first();
        $path = storage_path('app/'.$file->file_path);
        return response()->download($path);
        // return response()->json(['message'=>$file], 200);

    }

    public function postFile(Request $request)
    {
        $file = $request->file('attachment');
        $folder = $request->input('ApplicationID');
        $extension = $file->getClientOriginalExtension();
        $attachment = $request->input('filename').'.'.$extension;
        $storagepath = $file->move(storage_path('app/attachment/'.$folder.'/'), $attachment);
        $fileurl = url('/'.$attachment);
        return response()->json(['url' => $fileurl], 200);
    }
}
