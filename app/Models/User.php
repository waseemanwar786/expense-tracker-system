<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 
        'email',
        'password',
    ];
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
