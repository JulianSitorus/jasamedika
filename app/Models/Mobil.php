<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mobil extends Model
{
    use HasFactory;
    protected $table = 'mobils';
    protected $guarded=[];

    // public function pinjam_mobil()
    // {
    //     return $this->hasMany('App\Models\Pinjam_mobil', 'id_voucher');
    // }
}
