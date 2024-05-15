<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Organization extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'user_id',
        'organization',
        'description'
    ];
}
