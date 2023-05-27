<div>
    <div>
        <livewire:card-notas />
    </div>
    <button wire:click="toggleModal">
        <livewire:boton-agregar />
    </button>
 @if($openModal)
 <div class="fixed inset-0 transition-opacity">
    <div class="fixed inset-0 z-40 bg-black opacity-50"></div>
 </div>
<div class="absolute top-96 right-48 bottom-40 text-left items-center justify-center">
    <div class="bg-yellow-300 bg-opacity-50 rounded-lg p-8">
        <form wire:submit.prevent="notas">
            <div class="mb-8">
                <label class="block left-10">Autor:</label>
                <input type="text" id="autor" class="rounded-full w-80" wire:model="Autor" value="{{ Auth::user()->name }}">
            </div>
            <div class="mb-8">
                <label class="block">Titulo:</label>
                <input type="text" id="titulo" class="rounded-full w-80" wire:model="Titulo">
            </div>

            <div class="mb-8">
                <label class="block">Historia:</label>
                <textarea id="historia" class="rounded-lg w-80" wire:model="Historia"></textarea>
                <br>
                <button wire:click="cerrarModal">Cerrar</button>
                <button type="submit">Publicar</button>
            </div>
        </form>
    </div>
</div>
@endif
</div>

