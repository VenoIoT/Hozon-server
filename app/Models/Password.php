<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory, HasUlids;

    protected $casts = [
        'password' => 'encrypted',
        'site' => 'encrypted',
        'title' => 'encrypted',
        'email' => 'encrypted',
    ];
    protected $fillable = [
        'title',
        'site',
        'password',
        'email',
        'note',
        'organization_id',
        'user_id'
    ];
}
