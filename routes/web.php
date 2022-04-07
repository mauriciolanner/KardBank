<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContractLivewire;
use App\Http\Livewire\AssociedLivewire;
use App\Http\Livewire\SubsidiaryLivewire;
use App\Http\Livewire\DependantLivewire;
use App\Http\Livewire\ConciliarLivewire;
use App\Http\Livewire\ImportarLivewire;
use App\Http\Livewire\RelatorioLivewire;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        })->name('dashboard');
    });

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/Contrato', ContractLivewire::class)->name('Contrato');
        Route::get('/associadas/{id}', AssociedLivewire::class)->name('Associadas');
        Route::get('/filiais/{id}', SubsidiaryLivewire::class)->name('Filiais');
        Route::get('/servidor/{id}', DependantLivewire::class)->name('Servidor');
        Route::get('/ImportarDados', ImportarLivewire::class)->name('ImportarDados');
        Route::get('/Conciliar', ConciliarLivewire::class)->name('Conciliar');
        Route::get('/Relatorio', RelatorioLivewire::class)->name('Relatorio');
    });
