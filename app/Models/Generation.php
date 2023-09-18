<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Generation extends Model
{
    use HasFactory;

    protected $table = "generations";

    protected $fillable = [
        'generations',
    ];

    public function human(): HasOne
    {
        return $this->hasOne(Human::class);
    }
}
