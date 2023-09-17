<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Generation extends Model
{
    use HasFactory;

    protected $table = "generations";

    protected $fillable = [
        'generations',
    ];

    public function humans(): HasMany
    {
        return $this->hasMany(Human::class);
    }
}
