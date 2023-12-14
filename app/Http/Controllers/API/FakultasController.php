<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\fakultas;
use App\Models\prodi;
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

    //update
    public function update(request $request, $id){
         $validate = $request->validate([
            'name' => 'required|unique:fakultas'
        ]);
        $fakultas = fakultas::where('id', $id)->update($validate);
        if($fakultas){
            $response['success'] = true;
            $response['message'] = 'fakultas berhasil diperbarui.';
            return response()->json($response, Response::HTTP_OK);
        }else{
            $response['success'] = false;
            $response['message'] = 'fakultas gagal diperbarui.';
            return response()->json($response,Response::HTTP_NOT_FOUND);
        }

    }

    public function destroy($id){
        $fakultas = fakultas::where('id', $id);
        if(count($fakultas)> 0){
            $prodi = prodi::where('fakultas_id', $id)->get();
            if(count($prodi)> 0){
                $response['success'] = false;
                $response['message'] = 'data fakultas tidak diizinkan dihapus dikarenakan digunakan ditable prodi';
                return response()->json($response, Response::HTTP_NOT_FOUND);
            }else{
                $fakultas->delete();
                $response['success'] = true;
                $response['message'] = 'fakultas berhasil dihapuz';
                return response()->json($response, Response::HTTP_OK);
            }
        }else{
            $response['success'] = false;
            $response['message'] = 'fakultas gagal dihapuz karena tdk ditemukan.';
            return response()->json($response,Response::HTTP_NOT_FOUND);
        }
    }
}
