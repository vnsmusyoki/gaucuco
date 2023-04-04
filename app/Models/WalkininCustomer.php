<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalkininCustomer extends Model
{
    use HasFactory;

    protected $dates = ['time_in', 'time_out'];
}
