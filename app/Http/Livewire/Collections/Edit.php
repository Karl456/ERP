<?php

namespace App\Http\Livewire\Collections;

use App\Enums\CollectionFieldTypes;
use App\Models\Collection;
use App\Models\CollectionField;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    public Collection $collection;

    public array $fields = [];

    protected $listeners = ['fieldsUpdated' => '$refresh'];

    public function mount()
    {
        $this->fields = $this->collection->fields()->get()->keyBy('id')->toArray();
    }

    public function updatedFields()
    {
        $this->updateFields();
    }

    public function rules(): array
    {
        return [
            'collection.name' => [
                'required',
                Rule::unique('collections', 'name')
                    ->ignore($this->collection->id),
            ],
            'fields.*.name' => 'required',
            'fields.*.type' => 'required',
            'fields.*.required' => '',
            'fields.*.primary' => '',
            'fields.*.in_table' => '',
        ];
    }

    public function render(): View
    {
        $collections = Collection::query()->pluck('name', 'id');

        return view('livewire.collections.edit', compact('collections'));
    }

    public function update(): Redirector
    {
        $this->validate();

        $this->collection->save();

        $this->updateFields();

        return redirect()->route('collections.edit', $this->collection->handle);
    }

    public function updateFields()
    {
        foreach($this->fields as $fieldId => $fieldData) {
            $collectionField = CollectionField::query()->where('id', $fieldId)->first();
            $collectionField->fill($fieldData);
            $collectionField->save();
        }

        $this->emit('fieldsUpdated');
    }

    public function addField()
    {
        $this->collection->fields()->create([
            'name' => '',
            'type' => CollectionFieldTypes::TEXT,
            'primary' => $this->fields->count() === 0,
        ]);

        $this->fields = $this->collection->fields()->get()->keyBy('id')->toArray();

        $this->emit('fieldsUpdated');
    }

    public function removeField($fieldId)
    {
        $this->collection->fields()->where('id', $fieldId)->delete();

        $this->emit('fieldsUpdated');
    }
}
