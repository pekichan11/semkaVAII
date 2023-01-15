<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    

    public function user() {
        return $this->hasOne(User::class);
    }

    public function book() { 
        return $this->hasOne(Book::class);
    }

}
