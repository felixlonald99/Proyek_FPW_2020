<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'room';
    protected $primaryKey = 'room_number';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'room_number',
        'roomtype_id'
    ];
}
