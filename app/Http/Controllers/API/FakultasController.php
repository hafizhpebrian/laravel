<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\fakultas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends Controller
{
    public function index(){
        $fakultas = fakultas:: all();
        return response()->json($fakultas, Response::HTTP_OK);
    }

    public function store(request $request){
        $validate = $request->validate([
            'name' => 'required|unique:fakultas'
        ]);
        fakultas::create($validate);
        $response['success'] = true;
        $response['message'] = 'fakultas berhasil disimpan.';
        return response()->json($response, Response::HTTP_CREATED);
    }
}
