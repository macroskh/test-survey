<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $name
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function surveys(): HasMany
    {
        return $this->hasMany(Survey::class);
    }
}
