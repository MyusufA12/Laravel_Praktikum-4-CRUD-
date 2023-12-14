<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(){
        return view('upload');//upload.balade.php
    }

    public function proses_upload(Request $request){//untuk melakukan proses upload
        $this->validate($request, [
        'file' => 'required',
        'keterangan' => 'required',
        ]);

        $file = $request->file('file');//ambil file nya untuk di masukan kedalam variable $file
        echo 'File Name: ' . $file->getClientOriginalName();//nama file aslinya
        echo '<br>';
        echo 'File Extension: ' . $file->getClientOriginalExtension();//nama extensinya
        echo '<br>';
        echo 'File Real Path: ' . $file->getRealPath();//ambil real path nya
        echo '<br>';
        echo 'File Size: ' . $file->getSize();//ambil sizenya
        echo '<br>';
        echo 'File Mime Type: ' . $file->getMimeType();//ambil mime type
        $tujuan_upload = 'uploads';
        $file->move($tujuan_upload, $file->getClientOriginalName());//upload ke directoty tujuan
        // file akan di simpan di dalam directory public/uploads

    }
}
