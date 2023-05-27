<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;

class Inicio extends Component
{
    public $openModal = false;
    public $Autor;
    public $Titulo;
    public $Historia;
    public $notas;

    protected $rules = [
        'Autor' => 'required',
        'Titulo' => 'required',
        'Historia' => 'required',
    ];

    public function toggleModal()
    {
        $this->openModal = !$this->openModal;
        if (!$this->openModal) {
            $this->resetForm();
        } else {
            $this->setAutor();
        }
    }

    public function cerrarModal()
    {
        $this->resetForm();
        $this->openModal = false;
    }

    public function notas()
    {
        $this->validate();

        // Obtén el ID del usuario autenticado
        $userId = Auth::id();

        // Crea la nota con el valor de user_id
        Nota::create([
            'autor' => $this->Autor,
            'titulo' => $this->Titulo,
            'historia' => $this->Historia,
            'user_id' => $userId,
        ]);

        // Limpia los campos del formulario
        $this->resetForm();
        $this->openModal = false;
    }

    public function mount()
    {
        // Obtener todas las notas existentes y asignarlas a la variable $notas
        $this->notas = Nota::all();

        // Obtén el nombre del usuario autenticado
        $this->setAutor();
    }

    protected function resetForm()
    {
        $this->reset(['Titulo', 'Historia']);
        $this->resetErrorBag();
    }

    protected function setAutor()
    {
        // Obtén el nombre del usuario autenticado
        $user = Auth::user();
        $this->Autor = $user->name;
    }

    public function render()
    {
        return view('livewire.inicio');
    }
}
