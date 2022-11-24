<?php

namespace App\Http\Livewire\Entities;

use App\Models\Collection;
use App\Models\Entity;
use Illuminate\View\View;
use Livewire\Component;

class Show extends Component
{
    public Collection $collection;

    public Entity $entity;

    public function render(): View
    {
        return view('livewire.entities.show');
    }
}
