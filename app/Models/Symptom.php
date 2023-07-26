<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'symptom_name'
    ];

    public function knowledge_bases()
    {
        return $this->hasMany(KnowledgeBase::class);
    }
}