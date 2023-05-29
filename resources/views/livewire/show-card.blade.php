@vite(['resources/css/app.css', 'resources/js/app.js'])
<div>
@extends('layouts.indecs')
@section('content')
<div class="min-h-screen bg-gradient-to-r from-blue-400 from-20% via-pink-300 via-50% to-violet-500 to-80%">
    <br>
    <br>
    <br>
<div class="flex">
    <!-- Nota -->
    <div class="relative bg-gray-200 p-8 rounded-lg shadow-xl mb-8 w-1/2">
        <div class="absolute top-0 left-0 transform -translate-x-4 -translate-y-4 bg-yellow-200 w-4 h-4 rounded-full"></div>
        <div class="absolute top-0 right-0 transform translate-x-4 -translate-y-4 bg-yellow-200 w-4 h-4 rounded-full"></div>
        <div class="absolute bottom-0 right-0 transform translate-x-4 translate-y-4 bg-yellow-200 w-4 h-4 rounded-full"></div>
        <div class="absolute bottom-0 left-0 transform -translate-x-4 translate-y-4 bg-yellow-200 w-4 h-4 rounded-full"></div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-4xl font-bold mb-4">{{ $nota->titulo }}</h2>
            <p class="text-gray-700 text-lg leading-relaxed">{{ $nota->historia }}</p>
            <p class="text-gray-500 mt-4">Autor: {{ $nota->autor }}</p>
        </div>
    </div>

    <!-- Comentarios -->
    <div class="w-1/2">
        <!-- Comentarios -->
        <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
        <div id="comentarios-container" class="mt-4 max-h-80 overflow-y-auto">
            <div class="space-y-4">
                @foreach ($nota->comentarios as $comentario)
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <p class="text-gray-700 text-sm">{{ $comentario->contenido }}</p>
                        <p class="text-gray-500 text-xs mt-1">Usuario: {{ $comentario->usuario->name ?? 'Usuario desconocido' }}</p>
                         @if(Auth::id() === $comentario->user_id)
                            <button class="btn-editar-comentario" data-comentario-id="{{ $comentario->id }}">Editar</button>
                            <button class="btn-confirmar-eliminacion" data-comentario-id="{{ $comentario->id }}">Eliminar</button>
                            <div class="modal" id="modalEditarComentario-{{ $comentario->id }}" style="display: none;">
                                <div class="modal-content">
                                    <h3>Editar Comentario</h3>
                                    <form action="/nota/{{ $nota->id }}/comentarios/{{ $comentario->id }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="contenido" class="w-full rounded" id="contenidoComentario-{{ $comentario->id }}"></textarea>
                                        <button type="submit">Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="modalEditarComentario-{{ $comentario->id }}">
                                <!-- Formulario de edición de comentario -->
                            </div>
                            <div class="fixed inset-x-0 bottom-16 flex items-center justify-center z-50 hidden" id="modalConfirmarEliminacion-{{ $comentario->id }}">
                                <div class="bg-white rounded-lg p-4 shadow-lg w-64">
                                    <h3 class="text-xl font-bold mb-2">Confirmar Eliminación</h3>
                                    <p class="text-gray-700 mb-4">¿Estás seguro de que deseas eliminar este comentario?</p>
                                    <form action="/nota/{{ $nota->id }}/comentarios/{{ $comentario->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none">Eliminar</button>
                                        <button type="button" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 focus:outline-none ml-2" id="btnCancelarEliminacion-{{ $comentario->id }}">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <form action="/nota/{{ $nota->id }}/comentarios" method="POST" class="mt-4">
            @csrf
            <textarea name="contenido" rows="2" placeholder="Escribe tu comentario" class="w-full bg-white border border-gray-300 rounded-lg p-4 text-sm focus:outline-none resize-none"></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">Enviar</button>
        </form>
    </div>
</div>

<a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">regresar/a>
</div>
@endsection
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.btn-editar-comentario').click(function() {
        var comentarioId = $(this).data('comentario-id');

        // Abrir el modal de edición
        $('#modalEditarComentario-' + comentarioId).show();
    });

    $('.btn-confirmar-eliminacion').click(function() {
        var comentarioId = $(this).data('comentario-id');

        // Abrir el modal de confirmación de eliminación
        $('#modalConfirmarEliminacion-' + comentarioId).show();
    });

    $('[id^="btnCancelarEliminacion-"]').click(function() {
        var comentarioId = $(this).attr('id').split('-')[1];

        // Cerrar el modal de confirmación de eliminación
        $('#modalConfirmarEliminacion-' + comentarioId).hide();
    });
});

</script>
<script>
    $(document).ready(function() {
        // Obtener el contenedor de comentarios
        var comentariosContainer = $('#comentarios-container');

        // Ajustar la posición del scroll al final
        comentariosContainer.scrollTop(comentariosContainer.prop('scrollHeight'));
    });
</script>