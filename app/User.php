<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function spaces() {
        return $this->belongsToMany(Space::class, 'user_space');
    }

    public function earnings() {
        return $this->hasMany(Earning::class);
    }

    public function spendings() {
        return $this->hasMany(Spending::class);
    }

    public function recurrings() {
        return $this->hasMany(Recurring::class);
    }

    public function budgets() {
        return $this->hasMany(Budget::class);
    }

    public function currency() {
        return $this->belongsTo(Currency::class);
    }
}
