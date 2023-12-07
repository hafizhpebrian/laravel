<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prodi extends Model
{
    use HasFactory, HasUuids;
    protected $table = "prodis";
    protected $fillable = ['nama', 'fakultas_id'];
    public function fakultas(){
        return $this->belongsTo(fakultas::class,'fakultas_id');
    }
}
