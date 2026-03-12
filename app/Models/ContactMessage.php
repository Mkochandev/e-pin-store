<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'is_read'
    ];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:i',
    ];
}