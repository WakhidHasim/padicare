<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'farmer_name',
        'address',
        'disease_id',
        'presentase'
    ];
}