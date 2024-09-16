<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
Route::post('/confirm', [FeedbackController::class, 'confirm'])->name('feedback.confirm');
Route::post('/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::get('/management', [ManagementController::class, 'index'])->name('management.index');
Route::get('management/show/{id}', [ManagementController::class, 'show'])->name('management.show');
