<?php

use App\Http\Controllers\CandidatoController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/candidatos');

Route::resource('candidatos', CandidatoController::class)->except('show');