<?php

namespace App\Http\Livewire\Entities;

use App\Models\Collection;
use Livewire\Component;

class Index extends Component
{
    public Collection $collection;

    public function render()
    {
        $entities = $this->collection->entities()->paginate(50);

        return view('livewire.entities.index', compact('entities'));
    }
}
