<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\dosen;
use App\pengguna;
use Input;
use Redirect;
use informasi;

class dosencontroller extends Controller
{   protected $informasi = 'gagal melakukan aksi';
    public function awal(){
        $semuaDosen = dosen::all();
        return view('dosen.awal', compact('semuaDosen'));
    }
    public function tambah(){
        return view('dosen.tambah');
    }
    public function simpan(Request $input){
        $pengguna = new pengguna($input->only('username','password'));
        if ($pengguna->save()){
        $dosen = new dosen;
        $dosen->nama=$input->nama;
        $dosen->nipp=$input->nipp;
        $dosen->alamat=$input->alamat;
        $dosen->pengguna_id=$input->pengguna_id;
                if ($pengguna->dosen()->save($dosen)) $this->informasi = 'berhasil simpan data'; 
    } return redirect('dosen')->with(['informasi' => $this->informasi]);}

    public function edit($id){
        $dosen=dosen::find($id);
        return view('dosen.edit')->with(array('dosen'=>$dosen));
    }
public function lihat($id){
        $dosen=dosen::find($id);
        return view('dosen.lihat')->with(array('dosen'=>$dosen));
    }

    public function update($id, Request $input){
        $dosen = dosen::find($id);
        $pengguna = $dosen->pengguna;
        $dosen ->nama=$input->nama;
        $dosen ->nipp=$input->nipp;
        $dosen ->alamat=$input->alamat;
        $dosen->save();
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
            return redirect('dosen')->with(['informasi=>$this->informasi']);}
        /*if ($dosen->save()){
            $pengguna = new pengguna($input->only('username'));
            if(!is_null($input->password))$pengguna->password= $input->password;
            if ($dosen->pengguna()->save($pengguna)) $this->informasi = 'berhasil simpan data';}
            return redirect('dosen/awal')->with(['informasi'=>$this->informasi]);
                   }*/
    public function hapus($id){
        $dosen = dosen::find($id);
        if ($dosen->pengguna()->delete()){
            if ($dosen->delete()) $this->informasi = 'berhasil hapus';
        } return redirect('dosen')->with(['informasi'=> $this->informasi]);
    }
}