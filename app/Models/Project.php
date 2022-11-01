<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class, 'nim', 'nim');
    }

    function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
