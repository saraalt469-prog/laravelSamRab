<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'user_id'];

    // Связь: задача принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}