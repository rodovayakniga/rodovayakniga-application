<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Human extends Model
{
    use HasFactory;

    protected $table = "humans";

    protected $fillable = [
        'name',
        'last_name',
        'sur_name',
        'birth_id',
        'generation_id',
        'rodovayakniga_id',
    ];

    public function generation(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function relationships(): BelongsToMany
    {
        return $this->belongsToMany(Human::class, 'who_is', 'human_id1', 'human_id2');
    }

    public function rodovayakniga(): BelongsTo
    {
        return $this->belongsTo(Rodovayakniga::class);
    }

    public function birth(): BelongsTo
    {
        return $this->belongsTo(Birth::class);
    }

}
