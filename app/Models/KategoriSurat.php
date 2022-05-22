<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
    use HasFactory;

    protected $table = 'kategori_surats';
    protected $fillable = ['kategori'];

    public $timestamps = false;

    public function relasiSurat()
    {
        return $this->hasOne('App\Models\Surat');
        // return $this->belongsTo(Surat::class);
    }
}
