<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\pengguna;
use Input;
use Redirect;
use informasi;

class penggunacontroller extends Controller
{
    public function awal(){
    	return view('pengguna.awal',['data'=>pengguna::all()]);
    }
    public function tambah(){
    	return view('pengguna.tambah');
    }
    public function simpan(Request $input){
    	$pengguna = new pengguna;
    	$pengguna->username=$input->username;
        $pengguna->password=$input->password;
        $informasi = $pengguna->save() ? 'berhasil input' : 'gagal simpan';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }

    public function edit($id){
        $pengguna=pengguna::find($id);
        return view('pengguna.edit')->with(array('pengguna'=>$pengguna));
    }
public function lihat($id){
        $pengguna=pengguna::find($id);
        return view('pengguna.lihat')->with(array('pengguna'=>$pengguna));
    }

    public function update($id, Request $input){
        $pengguna = pengguna::find($id);
        $pengguna ->username=$input->username;
        $pengguna ->password=$input->password;
        $informasi = $pengguna->save()? 'berhasil update' : 'gagal ya';

        return redirect('pengguna')-> with(['informasi'=>$informasi]);
    }
    public function hapus($id){
        $pengguna = pengguna::find($id);
        $informasi = $pengguna->delete() ? 'berhasil hapus data' : 'gagal hapus data';
        return redirect('pengguna')->with(['informasi'=>$informasi]);
    }

    }