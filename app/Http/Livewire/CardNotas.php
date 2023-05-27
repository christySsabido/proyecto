<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Nota;
use Illuminate\Support\Facades\Auth;

class CardNotas extends Component
{
    use WithPagination;
    public $selectedNoteId; // Variable para almacenar el ID de la nota seleccionada
    public $expandedNoteId; // Variable para almacenar el ID de la nota expandida

    public function render()
    {
        $notas = Nota::paginate(3);

        return view('livewire.card-notas', [
            'notas' => $notas
        ]);
    }


    public function eliminarNota($notaId)
    {
        $nota = Nota::findOrFail($notaId);
        $nota->delete();
    }
    public function getLimitedText($text, $limit = 20)
    {
        $words = explode(' ', $text);

        if (count($words) > $limit) {
            $limitedWords = array_slice($words, 0, $limit);
            $limitedText = implode(' ', $limitedWords);
            return $limitedText . '...';
        }

        return $text;
    }
    public function mostrarContenidoCompleto($notaId)
    {
        if ($this->expandedNoteId == $notaId) {
            $this->expandedNoteId = null; // Si ya está expandida, ocultamos el contenido completo
        } else {
            $this->expandedNoteId = $notaId; // Almacena el ID de la nota expandida
        }
    }
}
