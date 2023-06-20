<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'technology_id', 'id');
    }

    public function festivals() {
        return $this->belongsToMany(Festival::class, 'festival_technologies', 'technology_id', 'festival_id');
    }
}
