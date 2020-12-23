<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookedRoomModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'bookedroom';
    protected $primaryKey = 'booking_number';
    public $timestamps = false;
}
