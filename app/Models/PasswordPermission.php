<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordPermission extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'password_id',
        'employee_id'
    ];

}
