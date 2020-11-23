<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomtypeModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'roomtype';
    protected $primaryKey = 'roomtype_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'roomtype_name',
        'roomtype_capacity',
        'roomtype_description',
        'roomtype_price'
    ];
}
