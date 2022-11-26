<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * @property uuid $id
 * @property string $name
 * @property string $handle
 */
class CollectionField extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'type',
        'config',
        'in_table',
        'primary',
        'required',
    ];

    protected $casts = [
        'config' => 'object',
    ];

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'name' => $value,
                'handle' => Str::snake($value),
            ]
        );
    }

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
