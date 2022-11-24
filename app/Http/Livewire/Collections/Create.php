<?php

namespace App\Http\Livewire\Collections;

use App\Models\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Create extends Component
{
    public Collection $collection;

    public function mount()
    {
        $this->collection = new Collection();
    }

    public function rules(): array
    {
        return [
            'collection.name' => 'required|unique:collections,name',
        ];
    }

    public function render(): View
    {
        $this->collection->load('fields')->toArray();

        return view('livewire.collections.create');
    }

    public function create(): Redirector
    {
        $this->validate();

        $this->collection->save();

        return redirect()->route('collections.index');
    }
}
