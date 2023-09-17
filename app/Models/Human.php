<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Human extends Model
{
    use HasFactory;

    protected $table = "humans";

    protected $fillable = [
        'birth_id',
        'generations_id',
        'rodovayakniga_id',
    ];

    public function generations(): BelongsTo
    {
        return $this->belongsTo(Generation::class);
    }

    public function rodovayakniga(): BelongsTo
    {
        return $this->belongsTo(Rodovayakniga::class);
    }

    public function birth(): BelongsTo
    {
        return $this->belongsTo(Birth::class);
    }

    public function fullName(): HasOne
    {
        return $this->hasOne(FullName::class);
    }

//    public function relativesHumans():


}
