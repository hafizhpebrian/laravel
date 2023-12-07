<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use App\Models\prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = prodi::all();
        return view("prodi.index")->with("prodi",$prodi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = fakultas::all();
        return view("prodi.create")->with("fakultas", $fakultas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', prodi::class);

         $validasi = $request->validate([
            "nama" => "required|unique:prodis",
            "fakultas_id" => "required"
        ]);

        prodi::create($validasi);
        return redirect("prodi")->with("success","data prodi berhasil di simpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(prodi $prodi)
    {
        $this->authorize('edit', $prodi);

        $fakultas = fakultas::all();

         return view("prodi.edit")->with("prodi", $prodi)->with("fakultas", $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, prodi $prodi)
    {
        $validasi = $request->validate(["nama" => "required", "fakultas_id" => "required"]);
        $prodi->update($validasi);
        return redirect("prodi")->with("success","data prodi berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(prodi $prodi)
    {
        $this->authorize('delete', $prodi);

        $prodi -> delete();
        return redirect()->route("prodi.index")->with("success","berhasil dihapus");
    }
}
