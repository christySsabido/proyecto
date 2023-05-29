<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Livewire\Navegacion;
use App\Http\Livewire\BotonInicio;
use App\Http\Livewire\BotonIniciar;
use App\Http\Livewire\BotonRegistrar;
use App\Http\Livewire\Imagen;
use App\Http\Livewire\BotonEntrar;
use App\Http\Livewire\BotonPerfil;
use App\Http\Livewire\BotonNotificaciones;
use App\Http\Livewire\BotonAcerca;
use App\Http\Livewire\BotonAgregar;
use App\Http\Livewire\Inicio;
use App\Http\Livewire\BotonEliminar;
use App\Http\Livewire\NaveComen;
use App\Models\Nota;
use App\Models\Comentario;
;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/nota/{id}', function ($id) {
    $nota = Nota::findOrFail($id);
    $comentarios = Comentario::where('nota_id', $id)->get();

    return view('livewire.show-card', compact('nota', 'comentarios'));
});
Route::delete('/nota/{id}/comentarios/{comentarioId}', function (Request $request, $id, $comentarioId) {
    $comentario = Comentario::where('id', $comentarioId)
                            ->where('nota_id', $id)
                            ->where('user_id', auth()->user()->id)
                            ->firstOrFail();

    $comentario->delete();

    return redirect()->back();
});
Route::put('/nota/{id}/comentarios/{comentarioId}', function (Request $request, $id, $comentarioId) {
    // Lógica para actualizar el comentario correspondiente al comentarioId
    $comentario = App\Models\Comentario::where('id', $comentarioId)
                                      ->where('nota_id', $id)
                                      ->where('user_id', auth()->user()->id)
                                      ->firstOrFail();

    // Verificar si el campo 'contenido' está vacío
    if (empty($request->contenido)) {
        return redirect()->back()->with('error', 'El campo de contenido no puede estar vacío');
    }

    $comentario->contenido = $request->contenido;
    $comentario->save();

    return redirect()->back();
});



Route::post('/nota/{id}/comentarios', function (Request $request, $id) {
    $comentario = new Comentario();
    $comentario->contenido = $request->input('contenido');
    $comentario->nota_id = $id;
    // Aquí puedes agregar el user_id correspondiente al usuario que realiza el comentario
    $comentario->user_id = auth()->user()->id; // Ejemplo de asignación del user_id actualmente autenticado
    $comentario->save();

    return redirect()->back();
});
Route::get('/navegacion', Navegacion::class);
Route::get('/botininicio', BotonInicio::class);
Route::get('/botoniniciar', BotonIniciar::class);
Route::get('/botonRegistrar', BotonRegistrar::class);
Route::get('/imagen', Imagen::class);
Route::get('/botonentrar', BotonEntrar::class);
Route::get('/botonperfil', BotonPerfil::class);
Route::get('/botonnotificaciones', BotonNotificaciones::class);
Route::get('/botonacerca', BotonAcerca::class);
Route::get('/botonagregar', BotonAgregar::class);
Route::get('/botoneliminar', BotonEliminar::class);
Route::get('/navecomen', NaveComen::class);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', Inicio::class)->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
