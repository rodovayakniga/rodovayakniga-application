<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FullName extends Model
{
    use HasFactory;

    protected $table = 'full_names';

    protected $fillable = [
        'name',
        'last_name',
        'sur_name'
    ];
}
