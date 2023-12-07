<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory, HasUuids;

    protected $table = "mahasiswas";
     public function prodi(){
        return $this->belongsTo(prodi::class,'prodi_id');
    }
}
