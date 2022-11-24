<?php

namespace App\Http\Livewire\Collections;

use App\Models\Collection;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $collections = Collection::query()->paginate(50);

        return view('livewire.collections.index', compact('collections'));
    }
}
