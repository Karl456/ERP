<?php

namespace App\Enums;

enum CollectionFieldTypes: string
{
    case TEXT = 'text';
    case NUMBER = 'number';
    case EMAIL = 'email';
    case COLLECTION = 'collection';

    public function name(): string
    {
        return match($this) {
            CollectionFieldTypes::TEXT => 'Text',
            CollectionFieldTypes::COLLECTION => 'Collection',
        };
    }

    public function rules(): array
    {
        return match($this) {
            CollectionFieldTypes::EMAIL => ['email'],
//            CollectionFieldTypes::COLLECTION => ['exists'],
            default => [],
        };
    }
}
