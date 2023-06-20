<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'member_status_id', 'id');
    }
}
