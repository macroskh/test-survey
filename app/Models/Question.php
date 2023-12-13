<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $survey_id
 * @property string $type
 * @property string $text
 * @property array|null $options
 * @method static Builder hasType(int $typeId)
 */
class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'survey_id',
        'type',
        'text',
        'options'
    ];

    protected $casts = [
        'options' => 'array'
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }

    public function scopeHasType(Builder $builder, int $typeId): Builder
    {
        return $builder->whereHas('survey', fn(Builder $query) => $query->where('type_id', $typeId));
    }
}
