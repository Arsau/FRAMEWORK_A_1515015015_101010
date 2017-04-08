<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\matakuliah;
use Input;
use Redirect;
use Informasi;

class matakuliahcontroller extends Controller
{
    public function awal(){
        return view('matakuliah.awal',['data'=>matakuliah::all()]);
    }
    public function tambah(){
        return view('matakuliah.tambah');
    }
    public function simpan(Request $input){
        $matakuliah = new matakuliah;
        $matakuliah->id=$input->id;
        $matakuliah->title=$input->title;
        $informasi = $matakuliah->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }

    public function edit($id){
        $matakuliah=matakuliah::find($id);
        return view('matakuliah.edit', compact('matakuliah'));
    }
public function lihat($id){
        $ruangan=ruangan::find($id);
        return view('matakuliah.lihat')->with(array('matakuliah'=>$matakuliah));
    }

    public function update($id, Request $input){
        $matakuliah = matakuliah::find($id);
        $matakuliah ->id=$input->id;
        $matakuliah ->title=$input->title;
        $informasi = $matakuliah->save()? 'berhasil update' : 'gagal ya';

        return redirect('ruangan')-> with(['informasi'=>$informasi]);
    }
    public function hapus($id){
        $matakuliah = matakuliah::find($id);
        $informasi = $matakuliah->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('matakuliah')->with(['informasi'=>$informasi]);
    }

    }