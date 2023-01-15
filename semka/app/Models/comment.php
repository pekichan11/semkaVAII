<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
    
    public function book() {
        return $this->hasOne(Book::class);
    }
}