<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'value'
    ];

    public function user() {
        return $this->hasOne(Used::class);
    }
}
