<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nota;
use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;

class ShowCard extends Component
{
    
    public $nuevoComentario;
    public $openModal = false;
    // ...
    public function toggleModal()
{
    $this->openModal = !$this->openModal;
}

    public function guardarComentario()
    {
        // Validación del comentario
        $this->validate([
            'nuevoComentario' => 'required|string|max:255',
        ]);

        // Crear el nuevo comentario en la base de datos
        Comentario::create([
            'contenido' => $this->nuevoComentario,
            'nota_id' => $this->nota->id,
            'user_id' => Auth::id(),
        ]);

        // Limpiar el campo del nuevo comentario
        $this->nuevoComentario = '';

        // Actualizar la vista
        $this->emit('comentarioGuardado');
    }

     public function render()
    {
        return view('livewire.show-card');
    }
}
   

    


