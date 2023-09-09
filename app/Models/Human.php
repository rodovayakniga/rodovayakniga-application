<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Human extends Model
{
    use HasFactory;

    protected $table = "humans";

    protected $fillable = [
        'name',
        'last_name',
        'sur_name',
        'birth_id',
        'generations_id',
        'father_id',
        'mother_id',
        'brothers_or_sisters_id',
        'rodovayakniga_id',
    ];

    public function rodovayakniga(): BelongsTo
    {
        return $this->belongsTo(Rodovayakniga::class);
    }


}
