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
}
