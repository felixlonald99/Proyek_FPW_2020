<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'booking';
    protected $primaryKey = 'booking_number';
    public $timestamps = true;
}
