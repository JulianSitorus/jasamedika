<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Pinjam_mobil extends Model
{
    use HasFactory;
    protected $table = 'pinjam_mobils';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function mobil()
    {
        return $this->belongsTo('App\Models\Mobil', 'id_mobil');
    }
}
