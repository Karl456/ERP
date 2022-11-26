<?php

namespace App\Models;

use App\Casts\FieldValueCast;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property uuid $id
 * @property json $field_values
 */
class Entity extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'field_values' => FieldValueCast::class,
    ];

    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class);
    }
}
