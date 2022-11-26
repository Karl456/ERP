<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property string $id
 * @property string $name
 * @property string $handle
 * @property \App\Models\Collection $fields
 */
class Collection extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function getRouteKeyName(): string
    {
        return 'handle';
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => [
                'name' => $value,
                'handle' => Str::snake($value),
            ]
        );
    }

    public function fields(): HasMany
    {
        return $this->hasMany(CollectionField::class)->orderBy('sort_order')->orderBy('created_at');
    }

    public function keyFields(): HasMany
    {
        return $this->fields()->where('in_table', true);
    }

    public function entities(): HasMany
    {
        return $this->hasMany(Entity::class);
    }
}
