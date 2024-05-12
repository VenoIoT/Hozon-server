<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory, HasUlids;

    protected $casts = [
        'credentials' => 'encrypted',
        'site' => 'encrypted',
        'title' => 'encrypted',
    ];
    protected $fillable = [
        'title',
        'site',
        'credentials',
        'note'
    ];
}
