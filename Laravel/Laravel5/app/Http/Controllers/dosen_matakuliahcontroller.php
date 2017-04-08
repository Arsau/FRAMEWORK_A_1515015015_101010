<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\dosen;
use App\dosen_matakuliah;
use App\matakuliah;
use App\jadwal_matakuliah;
use Input;
use Redirect;
use informasi;

class dosen_matakuliahcontroller extends Controller
{
    public function awal()
    {
        $Semua_Dosen_Matakuliah = Dosen_Matakuliah::all();
        return view('dosen_matakuliah.awal', compact('Semua_Dosen_Matakuliah'));
    }

    public function tambah()
    {      
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
        return $this->simpan();
    }

    public function simpan(Request $input)
    {
        $dosen_matakuliah = new Dosen_Matakuliah($input->only('dosen_id','matakuliah_id'));
            if($dosen_matakuliah->save()) $this->informasi = "Matakuliad dan Dosen Mengajar berhasil disimpan";
            return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }
    public function lihat($id){
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        return view('dosen_matakuliah.lihat',compact('dosen_matakuliah'));
    }
    public function edit($id){
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen','matakuliah','dosen_matakuliah'));
    }
    public function update($id,Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Matakuliad dan Dosen Mengajar berhasil diperbarui";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }
    public function hapus($id,Request $input)
    {
        $dosen_matakuliah = Dosen_Matakuliah::find($id);
        if($dosen_matakuliah->delete()) $this->informasi = "Matakuliad dan Mahasiswa berhasil dihapus";
        return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
    }

    }