<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'disease_name',
        'slug',
        'description',
        'solution'
    ];

    public function knowledge_bases()
    {
        return $this->hasMany(KnowledgeBase::class);
    }

    public function Diagnoses()
    {
        return $this->hasMany(Diagnosis::class);
    }
}