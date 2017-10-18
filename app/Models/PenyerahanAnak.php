<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PenyerahanAnak extends Model
{
    protected $table = 'penyerahan_anak';

    public function getStatus()
    {
        $status = [0=>'Dibatalkan',1=>'Menunggu Persetujuan',2=>'Disetujui'];
        return $status[$this->status];
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function checkQuota()
    {
        $check = PenyerahanAnak::where('pendeta',$this->pendeta)->where('tgl_penyerahan',$this->tgl_penyerahan)->count();

        return $check > 10 ? false : true;
    }
}
