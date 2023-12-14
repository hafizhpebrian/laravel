<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiwa = mahasiswa::with('prodi.fakultas')->get();
        return response()->json($mahasiwa, 200);
    }

    public function store(request $request){
        $validate = $request->validate([
            'npm' => 'required|unique:mahasiswas',
            'name' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required',
            'prodi_id' => 'required',
            'jk' => 'required'
        ]);
        mahasiswa::create($validate);
        $response['success'] = true;
        $response['message'] = 'mahasiswa berhasil disimpan.';
        return response()->json($response, 200);
    }
}
