<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuestModel extends Model
{
    protected $connection= 'mysql';
    protected $table = 'guest';
    protected $primaryKey = 'email';
    public $incrementing = false;
    public $timestamps = true;
    protected $fillable = [
        'email',
        'name',
        'phone',
        'password',
        'birthdate'
    ];
    use SoftDeletes;
}
