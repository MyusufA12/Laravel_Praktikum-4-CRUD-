<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
class Controller1 extends Controller
{

    public function create()
    {
        return view('create');
    }

    public function update($nim)
    {
        if($data=Mahasiswa::find($nim)) {
            return view('update',['data'=>$data]);
        } else return redirect('/read');
    }

    public function edit(Request $request)
    {
        if($data=Mahasiswa::find($request->nim)) {
            $data->nama=@$request->nama;
            $data->umur=@$request->umur;
            $data->email=@$request->email;
            $data->kelas=@$request->kelas;
            $data->jurusan=@$request->jurusan;
            $data->alamat=@$request->alamat;
            $data->updated_at=now('Asia/Jakarta');
            $data->save();
            return redirect('/read')->with('pesan', 'data dengan NIM : '.$request->nim.' berhasil diupdate');
    } else {
        return redirect('/read')->with('pesan', 'data tidak ditemukan/gagal diupdate');
    }

    }

    public function save(Request $request)
    {
        $validatedData = $request->validate([
            'nim' => 'required|regex:/^G.\d{3}.\d{2}.\d{4}$/|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'umur' => 'required|integer|between:1,100',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'alamat' => 'required|min:6',
            'email' => 'required|email'
             ]); 


        $model = new Mahasiswa ();
        $model->insert([
            'nim' => @$request->nim,
            'nama' => @$request->nama,
            'alamat' => @$request->alamat,
            'umur' => @$request->umur,
            'email' => $request->email,
            'kelas' => @$request->kelas,
            'jurusan' => @$request->jurusan,
            'created_at' => now('Asia/Jakarta'),
        ]);
        
        return view('view',['data'=>$request->all()]);
    }

    public function read()
    {
        $model = new Mahasiswa ();
        $dataAll=$model->all();
        return view('read', ['dataAll'=>$dataAll]);
    }

    public function delete($nim)
    {
        if ($data = Mahasiswa::find($nim))
        {
            $data->delete();
        } else {
            return redirect('/read')->with('pesan', 'Data NIM : '.@$nim.' tidak ditemukan');
        }   
        return redirect('/read')->with('pesan', 'Data NIM : '.@$nim.' Berhasil dihapus');
    }

    public function tampilkan (Request $request)
    {
        $model = new Mahasiswa ();
        $model::insert(['nim' =>@$request->nim, 'nama' =>@$request->nama, 'alamat' =>@$request->alamat, 'created_at'=>@$request->created_at]);

        $dataAll=$model->all();
        return view ('tampil2', ['data'=>$request->all(), 'dataAll'=>@$dataAll ] );
    }

    public function logout(){
        return view('logout');
    }
}