<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Birth extends Model
{
    use HasFactory;

    protected $table = "births";

    protected $fillable = [
        'data_birth',
        'location_birth',
        'weight',
        'height',
        'eye_color',
        'hair_color',
        'nationality',
    ];

    public function human(): HasOne
    {
        return $this->hasOne(Human::class);
    }
}
