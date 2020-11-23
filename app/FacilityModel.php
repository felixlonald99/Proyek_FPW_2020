<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'facility';
    protected $primaryKey = 'facility_id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'facility_name',
        'room_id',
    ];
}
