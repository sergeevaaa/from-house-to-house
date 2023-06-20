<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'festival_id',
        'member_status_id',
        'name',
        'technology_id',
        'technology',
        'organization',
        'video',
        'app_status_id',
        'note',
       'certificate'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function festival() {
        return $this->belongsTo(Festival::class, 'festival_id', 'id');
    }

    public function member_status() {
        return $this->belongsTo(Member_status::class, 'member_status_id', 'id');
    }

    public function technology_selected() {
        return $this->belongsTo(Technology::class, 'technology_id', 'id');
    }

    public function app_status() {
        return $this->belongsTo(Application_status::class, 'app_status_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'application_id', 'id');
    }
}
