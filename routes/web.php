<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\UserPageController;
use App\Http\Controllers\AnnouncementController;
use App\Models\Announcement;

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

//Rotte Front
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/visualizza-categoria/{category}', [FrontController::class, 'categoryShow'])->name('category.show');
//Ricerca annuncio
Route::get('/ricerca-annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');
//Cambio lingua
Route::post('/lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set.language.locale');

//Rotte articoli
//Inserimento del middeleware per il controllo se l'utente è loggato
Route::get('/nuovo-annuncio', [PublicController::class, 'createAnnouncement'])->middleware('auth')->name('announcement.create');
Route::get('/dettaglio-annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcement.show');
Route::get('/tutti-annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcement.index');

//Revisore home
Route::get('/revisor-home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::get('/diventa-revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi-revisore{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Accetta annuncio
Route::patch('/accetta-annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

//Rifiuta annuncio
Route::patch('/rifiuta-annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

//Annulla annuncio
Route::patch('/annulla-annuncio/{announcement}', [RevisorController::class, 'undoAnnouncement'])->middleware('isRevisor')->name('revisor.undo_announcement');

// userPage
Route::get('/user-home', [UserPageController::class, 'index'])->name('userPage.index');
// userPage modifica annuncio
Route::get('/modifica-annuncio/{user_announcement}/edit', function(Announcement $user_announcement){return view('userPage.edit',compact('user_announcement'));})->middleware('auth')->name('userPage.edit_announcement');
// userPage cancella annuncio
Route::delete('user-deleteAnnouncement/{user_announcement}', [UserPageController::class, 'destroy'])->middleware('auth')->name('userPage.delete_announcement');
