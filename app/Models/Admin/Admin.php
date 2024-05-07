<?php

namespace App\Models\Admin;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    // @var array<int, string> $fillable Define the columns that are mass assignable
    // Define the columns that are mass assignable
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    // Define the columns that should be hidden for arrays
    protected $hidden = [
        'password',
    ];

    // Define the columns that should be cast to native types
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
}