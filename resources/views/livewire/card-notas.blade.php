<div>
  
<div class="container mx-auto px-8 py-16 bg-white bg-opacity-50 mt-32">
    <!---Card Notas --->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($notas as $nota)
        <div class="bg-gradient-to-b from-white to-red-200 rounded-lg shadow-lg transition duration-500 transform hover:scale-105 mb-4 ml-4 py-16 relative">
            <div class="bg-pink-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-4"></div>
            <div class="bg-rose-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-16"></div>
            <div class="bg-pink-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-28"></div>
            <div class="bg-rose-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-40"></div>
            <div class="bg-pink-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-52"></div>
            <div class="bg-rose-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-64"></div>
            <div class="bg-pink-200 rounded-full px-4 py-4 mr-96 absolute top-4 left-80"></div>
            <div class="p-6">
                <h2 class="text-lg font-bold mb-2">{{ $nota->titulo }}</h2>
                @if($expandedNoteId == $nota->id)
                    <p class="text-gray-700 mb-2">{{ $nota->historia }}</p>
                    <a wire:click="mostrarContenidoCompleto({{ $nota->id }})" class="text-blue-500 cursor-pointer">Leer menos</a>
                @else
                    <p class="text-gray-700 mb-2">{{ $this->getLimitedText($nota->historia) }}</p>
                    @if (str_word_count($nota->historia) > 20)
                        <a wire:click="mostrarContenidoCompleto({{ $nota->id }})" class="text-blue-500 cursor-pointer">Leer más</a>
                    @endif
                @endif
            </div>
            <div class="px-6 py-2 flex justify-between items-center text-white text-xs ml-0">
                <span>{{ $nota->autor }}</span>
                <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none" wire:click="irAPaginaNota({{ $nota->id }})">Ver Comentario</button>
                @if(Auth::id() === $nota->user_id)
                        <button class="px-4 py-2 bg-emerald-300 text-white rounded hover:bg-emerald-500 focus:outline-none" wire:click="eliminarNota({{ $nota->id }})">Eliminar</button>
                @endif
                </div>
        </div>
    @endforeach
</div>
     <!---Paginacion---> 
</div>
<div class="mt-8">
     {{ $notas->links() }}
  </div>

</div>
<script src="https://cdn.tailwindcss.com"></script>