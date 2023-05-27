<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BotonAgregar extends Component
{
    public $openModal = false;

    public function toggleModal()
    {
        $this->openModal = true;
    }
    public function cerrarModal()
    {
        $this->openModal = false;
    } 
    public function render()
    {
        return view('livewire.boton-agregar');
    }
}
