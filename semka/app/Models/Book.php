<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'plot',
    ];

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = ucfirst($title);
    }
}
