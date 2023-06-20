<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application_status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function applications() {
        return $this->hasMany(Application::class, 'app_status_id', 'id');
    }
}
