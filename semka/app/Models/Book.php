<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autor;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'plot',
    ];

    public function autor() {
        return $this->hasOne(Autor::class);
    }

    public function setTitleAttribute($title)
    {
        $this->attributes['title'] = ucfirst($title);
    }
}
