<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Admin extends Model
{
    protected $table = 'admin';

    protected $fillable = [
        'password'
    ];
}
