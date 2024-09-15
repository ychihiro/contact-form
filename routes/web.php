<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/confirm', [FeedbackController::class, 'confirm'])->name('feedback.confirm');
Route::post('/create', [FeedbackController::class, 'create'])->name('feedback.create');
