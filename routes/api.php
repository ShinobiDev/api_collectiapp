<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Proteger todas las rutas con JWT excepto login, register y refresh
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/refresh', [AuthController::class, 'refresh']);

Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('/user', [AuthController::class, 'getUser']);

    // Rutas para Usuarios
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);       // Lista todos los usuarios
        Route::post('/', [UserController::class, 'store']);      // Crear nuevo usuario
        Route::get('/{id}', [UserController::class, 'show']);    // Ver usuario por ID
        Route::put('/{id}', [UserController::class, 'update']);  // Actualizar usuario
        Route::delete('/{id}', [UserController::class, 'destroy']); // Eliminar usuario
    });

    // Rutas para Estados
    Route::prefix('statuses')->group(function () {
        Route::get('/', [StatusController::class, 'index']);       // Lista todos los estados
        Route::post('/', [StatusController::class, 'store']);      // Crear nuevo estado
        Route::get('/{id}', [StatusController::class, 'show']);    // Ver estado por ID
        Route::put('/{id}', [StatusController::class, 'update']);  // Actualizar estado
        Route::delete('/{id}', [StatusController::class, 'destroy']); // Eliminar estado
    });

    // Rutas para Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);       // Lista todos los roles
        Route::post('/', [RoleController::class, 'store']);      // Crear nuevo rol
        Route::get('/{id}', [RoleController::class, 'show']);    // Ver rol por ID
        Route::put('/{id}', [RoleController::class, 'update']);  // Actualizar rol
        Route::delete('/{id}', [RoleController::class, 'destroy']); // Eliminar rol
    });

    // Rutas para Tipos
    Route::prefix('roles')->group(function () {
        Route::get('/', [TypeController::class, 'index']);       // Lista todos los tipos
        Route::post('/', [TypeController::class, 'store']);      // Crear nuevo tipo
        Route::get('/{id}', [TypeController::class, 'show']);    // Ver tipo por ID
        Route::put('/{id}', [TypeController::class, 'update']);  // Actualizar tipo
        Route::delete('/{id}', [TypeController::class, 'destroy']); // Eliminar tipo
    });

    // Rutas para Generos
    Route::prefix('genders')->group(function () {
        Route::get('/', [GenderController::class, 'index']);       // Lista todos los generos
        Route::post('/', [GenderController::class, 'store']);      // Crear nuevo genero
        Route::get('/{id}', [GenderController::class, 'show']);    // Ver genero por ID
        Route::put('/{id}', [GenderController::class, 'update']);  // Actualizar genero
        Route::delete('/{id}', [GenderController::class, 'destroy']); // Eliminar genero
    });

    // Rutas para Autores
    Route::prefix('authors')->group(function () {
        Route::get('/', [AuthorController::class, 'index']);       // Lista todos los autores
        Route::post('/', [AuthorController::class, 'store']);      // Crear nuevo autor
        Route::get('/{id}', [AuthorController::class, 'show']);    // Ver autor por ID
        Route::put('/{id}', [AuthorController::class, 'update']);  // Actualizar autor
        Route::delete('/{id}', [AuthorController::class, 'destroy']); // Eliminar autor
    });

    // Rutas para Categorias
    Route::prefix('authors')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);       // Lista todos los categorias
        Route::post('/', [CategoryController::class, 'store']);      // Crear nuevo categoira
        Route::get('/{id}', [CategoryController::class, 'show']);    // Ver categoira por ID
        Route::put('/{id}', [CategoryController::class, 'update']);  // Actualizar categoira
        Route::delete('/{id}', [CategoryController::class, 'destroy']); // Eliminar categoira
    });

    // Rutas para Editoriales
    Route::prefix('editorials')->group(function () {
        Route::get('/', [EditorialController::class, 'index']);       // Lista todos los editoriales
        Route::post('/', [EditorialController::class, 'store']);      // Crear nuevo editorial
        Route::get('/{id}', [EditorialController::class, 'show']);    // Ver editorial por ID
        Route::put('/{id}', [EditorialController::class, 'update']);  // Actualizar editorial
        Route::delete('/{id}', [EditorialController::class, 'destroy']); // Eliminar editorial
    });

    // Rutas para Colecciones
    Route::prefix('collections')->group(function () {
        Route::get('/', [CollectionController::class, 'index']);       // Lista todos los colecciones
        Route::post('/', [CollectionController::class, 'store']);      // Crear nuevo coleccion
        Route::get('/{id}', [CollectionController::class, 'show']);    // Ver coleccion por ID
        Route::put('/{id}', [CollectionController::class, 'update']);  // Actualizar coleccion
        Route::delete('/{id}', [CollectionController::class, 'destroy']); // Eliminar coleccion
    });
});
