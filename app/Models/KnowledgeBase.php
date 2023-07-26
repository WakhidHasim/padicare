<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    protected $fillable = [
        'symptom_id',
        'disease_id',
        'certainty_factor'
    ];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class, 'symptom_id');
    }

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}