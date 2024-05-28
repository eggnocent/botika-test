<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'status', 'pekerjaan_id', 'divisi_id'];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class);
    }
}

