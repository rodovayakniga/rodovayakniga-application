<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RelativesHuman extends Model
{
    use HasFactory;

    protected $table = "relatives_humans";

    protected $fillable = [
        'human_id',
        'who_is',
    ];

    public function humans(): BelongsTo
    {
        return $this->belongsTo(Human::class);
    }
}
