<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FullName extends Model
{
    use HasFactory;

    protected $table = 'full_names';

    protected $fillable = [
        'name',
        'last_name',
        'sur_name',
        'human_id',
    ];

    public function human(): BelongsTo
    {
        return $this->belongsTo(Human::class);
    }
}
