<?php

namespace App\Http\Controllers;

use App\Models\fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function __construct()
    {
        $this->middleware
        ('checkRole:A')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = fakultas::all();
        return view("fakultas.index")->with("fakultas", $fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("fakultas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request);

       // validasi data input
        $validasi = $request->validate([
            "name" => "required|unique:fakultas"
        ]);
       //simpan data ke tabel fakultas
       Fakultas::create($validasi);

       return redirect("fakultas")->with("success", "Data fakultas berhasil disimpan");
    }

    /**
     * Display the specified resource.
     */
    public function show(fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($fakultas);
        $fakultas = fakultas::find($id);
         return view("fakultas.edit")->with("fakultas", $fakultas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validasi = $request->validate(["name"=>"required"]);
        fakultas::find($id)->update($validasi);
        return redirect('fakultas')->with('success','Data fakultas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = fakultas::find($id);
        // dd($fakultas);
        $fakultas -> delete();
        return redirect()->route("fakultas.index")->with("success","berhasil dihapus");
    }
}
