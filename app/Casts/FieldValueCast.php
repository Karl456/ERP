<?php

namespace App\Casts;

use App\Models\Collection;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FieldValueCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): object
    {
        $fields = json_decode($value);

        foreach($model->collection->fields->where('type', 'collection') as $field) {
            $fieldHandle = $field->handle;
            if($fieldCollection = Collection::with('entities', 'fields')->find($field->config->collection)) {
                $fieldValue = $fields->$fieldHandle;

                if($entity = $fieldCollection->entities->find($fieldValue)) {
                    $entityPrimaryField = $fieldCollection->fields->where('primary', true)->first()->handle;
                    $fields->$fieldHandle = $entity->field_values->$entityPrimaryField ?? $fieldValue;
                }
            }
        }

        return $fields;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
