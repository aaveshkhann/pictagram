<?php

namespace App\Http\Controllers;
use App\Models\TempFile;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function temp_upload(Request $request) {

        if($request->file('profile_image')) {

                $file= $request->file('profile_image');
                $foldername = date('YmdHi');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('profile_image/temp/'.$foldername), $filename);
            TempFile::create([
                'folder' => $foldername,
                'filename' => $filename
            ]);
        }
        return $foldername;
    }
}
