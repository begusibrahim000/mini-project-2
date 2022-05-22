<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $table = 'surats';
    protected $fillable = ['judul,file_surat,keterangan,status'];

    public $timestamps = false;

    public function relasiKategori()
    {
        return $this->belongsTo('App\Models\KategoriSurat');
        // return $this->hasOne(KategoriSurat::class);
    }
}
