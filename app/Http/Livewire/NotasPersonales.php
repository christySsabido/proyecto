<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Nota;
use Illuminate\Database\Eloquent\Relations\HasMany;


class NotasPersonales extends Component
{
    protected $notas;
    public $perPage = 1;

    public function mount()
    {
        $user = auth()->user();
        $this->notas = $user->notas()->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.notas-personales', [
            'notas' => $this->notas,
        ])->layout('layouts.app');
    }
}