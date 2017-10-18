<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemberkatanNikah extends Model
{
    protected $table = 'pemberkatan_nikah';

    public function getStatus()
    {
        $status = [0=>'Dibatalkan',1=>'Menunggu Persetujuan',2=>'Disetujui'];
        return $status[$this->status];
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
