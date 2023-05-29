<script src="https://cdn.tailwindcss.com"></script>
<div>
HBSXCHJDSBHJCVBSDHJVBSDJVHBSD
@foreach ($notas as $nota)
    <div class="bg-yellow-100 border-l-4 border-yellow-400 shadow-md rounded-md p-8 mb-8">
        <h2 class="text-3xl font-semibold mb-4">{{ $nota->titulo }}</h2>
        <p class="text-gray-700 text-lg leading-relaxed mb-6">{{ $nota->historia }}</p>
        <div class="flex justify-between items-center">
            <span class="text-gray-500 text-base">{{ $nota->created_at->format('d/m/Y') }}</span>
            <button class="px-6 py-3 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">Editar</button>
        </div>
    </div>
@endforeach

<br>
{{ $notas->onEachSide(1)->links('livewire.pagination') }}



</div>