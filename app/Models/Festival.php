<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'end',
        'deadline',
        'deadline_members',
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'festival_id', 'id');
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class, 'festival_technologies', 'festival_id', 'technology_id');
    }
}
