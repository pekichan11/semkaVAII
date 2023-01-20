<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
    
    public function loan() {
        return $this->hasMan(Loan::class);
    }

    public function setPasswordAttribute($password) {
        $this->attributes['password'] = bcrypt($password);
    }
}
