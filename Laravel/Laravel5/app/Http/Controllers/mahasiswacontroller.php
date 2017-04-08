<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\mahasiswa;
use App\pengguna;
use Input;
use Redirect;
use informasi;

class mahasiswacontroller extends Controller
{   protected $informasi = 'gagal melakukan aksi';
    public function awal(){
        $semuaMahasiswa = mahasiswa::all();
        return view('mahasiswa.awal', compact('semuaMahasiswa'));
    }
    public function tambah(){
        return view('mahasiswa.tambah');
    }
    public function simpan(Request $input){
        $pengguna = new pengguna($input->only('username','password'));
        if ($pengguna->save()){
        $mahasiswa = new mahasiswa;
        $mahasiswa->nama=$input->nama;
        $mahasiswa->nim=$input->nim;
        $mahasiswa->alamat=$input->alamat;
        $mahasiswa->pengguna_id=$input->pengguna_id;
                if ($pengguna->mahasiswa()->save($mahasiswa)) $this->informasi = 'berhasil simpan data'; 
    } return redirect('mahasiswa')->with(['informasi' => $this->informasi]);}

    public function edit($id){
        $mahasiswa=mahasiswa::find($id);
        return view('mahasiswa.edit')->with(array('mahasiswa'=>$mahasiswa));
    }
public function lihat($id){
        $mahasiswa=mahasiswa::find($id);
        return view('mahasiswa.lihat')->with(array('mahasiswa'=>$mahasiswa));
    }

    public function update($id, Request $input){
        $mahasiswa = mahasiswa::find($id);
        $pengguna = $mahasiswa->pengguna;
        $mahasiswa ->nama=$input->nama;
        $mahasiswa ->nim=$input->nim;
        $mahasiswa ->alamat=$input->alamat;
        $mahasiswa->save();
                if(!is_null($input->username)){
            $pengguna->fill($input->only('username'));
            if (!empty($input->password)){
                $pengguna->password=$input->password;
            }
            if ($pengguna->save()) $this->informasi='berhasil simpan';
            } 
            else{
                 $this->informasi = 'gagal simpan';
            }
            return redirect('mahasiswa')->with(['informasi=>$this->informasi']);}
        /*if ($mahasiswa->save()){
            $pengguna = new pengguna($input->only('username'));
            if(!is_null($input->password))$pengguna->password= $input->password;
            if ($mahasiswa->pengguna()->save($pengguna)) $this->informasi = 'berhasil simpan data';}
            return redirect('mahasiswa/awal')->with(['informasi'=>$this->informasi]);
                   }*/
    public function hapus($id){
        $mahasiswa = mahasiswa::find($id);
        if ($mahasiswa->pengguna()->delete()){
            if ($mahasiswa->delete()) $this->informasi = 'berhasil hapus';
        } return redirect('mahasiswa')->with(['informasi'=> $this->informasi]);
    }
}