<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table= 'room_type';
    protected $fillable= [
        'tipe_kamar',
        'harga_kamar',
        'foto_kamar',
        'detail_kamar'
    ];
    public $timestamps= true;
}
