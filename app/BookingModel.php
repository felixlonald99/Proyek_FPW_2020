<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'booking';
    protected $primaryKey = 'booking_number';
    public $timestamps = true;
    protected $fillable = [
        'booking_number',
        'guest_email',
        'guest_name',
        'roomtype_id',
        'roomtype_name',
        'room_number',
        'check_in',
        'check_out',
        'nights',
        'total_price',
        'booking_status',
        'payment_method',
        'payment_status',
        'payment_datetime',
        'use_promo'
    ];
}
