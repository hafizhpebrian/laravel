<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\prodi;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function index(){
        $prodi = prodi::with('fakultas')->get();
        return response()->json($prodi, 200);
    }

    public function store(request $request){
        $validate = $request->validate([
            'name' => 'required|unique:prodi',
            'fakultas_id' =>'required'
        ]);
        prodi::create($validate);
        $response['success'] = true;
        $response['message'] = 'prodi berhasil disimpan.';
        return response()->json($response, 200);
    }
}
