<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    protected $fillable = ['NIM', 'Nama', 'Jurusan'];
    protected $table ='mahasiswa';
    protected $primaryKey ='NIM';
    public $incrementing = false;

}
