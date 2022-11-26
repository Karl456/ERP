<?php

namespace App\Http\Livewire\Entities;

use App\Enums\CollectionFieldTypes;
use App\Models\Collection;
use App\Models\Entity;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Create extends Component
{
    public Collection $collection;

    public Entity $entity;

    public \Illuminate\Support\Collection $fields;

    public array $field_values = [];

    public function mount()
    {
        $this->entity = new Entity();

        $this->fields = $this->collection->fields()->get();
    }

    public function rules(): array
    {
        $validationRules = [];

        foreach($this->fields as $field) {
            $fieldValidationRules = [];
            if($field->required) {
                $fieldValidationRules[] = 'required';
            }
            if($fieldTypeRules = CollectionFieldTypes::from($field->type)->rules()) {
                $fieldValidationRules = array_merge($fieldValidationRules, $fieldTypeRules);
            }
            $validationRules['field_values.' . $field->handle] = $fieldValidationRules;
        }

        return $validationRules;
    }

    public function messages(): array
    {
        $validationMessages = [];

        foreach($this->fields as $field) {
            if($field->required) {
                $validationMessages['field_values.' . $field->handle] = $field->name . ' field is required';
            }
        }

        return $validationMessages;
    }

    public function render(): View
    {
        return view('livewire.entities.create');
    }

    public function create(): Redirector
    {
        $this->validate();

        $this->entity->collection()->associate($this->collection);

        $this->entity->field_values = $this->field_values;

        $this->entity->save();

        return redirect()->route('entities.show', [$this->collection->handle, $this->entity->id]);
    }
}
