<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function userFrom()
    {
        return $this->belongsTo('App\Models\User', 'from_user_id');
    }

    public function userTo(){
        return $this->belongsTo('App\Models\User', 'to_user_id');
    }

    public function scopeNotDeleted($query)
    {
        return $query->where('is_deleted', false);
    }
}
