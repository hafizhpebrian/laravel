<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use App\Models\prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view("mahasiswa.index")->with("mahasiswa", $mahasiswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::all();
         return view("mahasiswa.create")->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validasi data input
        $validasi = $request->validate([
            "npm" => "required|unique:mahasiswa",
            "name" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            "prodi_id" => "required",
            "foto" => "required|image"
        ]);
        //ambil extensi file foto
        $ext = $request->foto->getclientOriginalExtension();
        //rename file foto menjadi npm.extensi (contoh: 2226250077.jpg)
        $validasi["foto"] = $request->npm.".".$ext;
        //upload file foto ke dalam folder public/foto
        $request->foto->move(public_path('foto'),$validasi["foto"]);
       //simpan data mahasiswa ke tabel mahasiswas
       Mahasiswa::create($validasi);

       return redirect("mahasiswa")->with("success", "Data fakultas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $prodi = prodi::all();
        return view("mahasiswa.edit")->with("mahasiswa", $mahasiswa)->with("prodi", $prodi);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $validasi = $request->validate([
            "npm" => "required",
            "name" => "required",
            "tempat_lahir" => "required",
            "tanggal_lahir" => "required",
            
            "prodi_id" => "required",
            "foto" => "image|nullable"
        ]);
        if($request->foto != null){
            //ambil extensi file foto
            $ext = $request->foto->getclientOriginalExtension();
            //rename file foto menjadi npm.extensi (contoh: 2226250077.jpg)
            $validasi["foto"] = $request->npm.".".$ext;
            //upload file foto ke dalam folder public/foto
            $request->foto->move(public_path('foto'),$validasi["foto"]);
        }

        $mahasiswa->update($validasi);
        return redirect("mahasiswa")->with("success", "Data fakultas berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa -> delete();
        return redirect()->route("mahasiswa.index")->with("success","berhasil dihapus");
    }
}
