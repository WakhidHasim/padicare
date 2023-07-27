<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'farmer_name',
        'phone_number',
        'address',
        'disease_id',
        'presentase'
    ];

    public function disease(){
        return $this->belongsTo(Disease::class, 'disease_id');
    } 
}