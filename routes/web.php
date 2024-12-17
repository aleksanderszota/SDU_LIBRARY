<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\SongController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'pl'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('changeLanguage');

Route::get('/music-library', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('Music_Library_pl_with_switcher');
    }
    return view('Music_Library');
})->name('music.library');

Route::get('/', function () {
    return view('first_page');
})->name('home');

Route::view('/second-page', 'second_page')->name('second.page');
Route::view('/second-page2', 'second_page2')->name('second.page2');

Route::get('/liked-songs', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('liked-songs_pl');
    }
    return view('liked-songs');
})->name('liked-songs');

Route::get('/search', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('search_pl');
    }
    return view('search');
})->name('search');

Route::get('/search_guest', function () {
$locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('search_guest_pl');
        }
        return view('search_guest');
    }
    )->name('search_guest');

Route::get('/playlists', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('playlists_pl');
    }
    return view('playlists');
})->name('playlists');

Route::get('/history', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('history_pl');
    }
    return view('history');
})->name('history');

Route::get('/profile-settings', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('profile_settings_pl');
    }
    return view('profile_settings');
})->name('profile-settings');

Route::get('/song-of-the-day', function () {
    $locale = Session::get('locale', 'en');
    if ($locale === 'pl') {
        return view('song_of_the_day_pl');
    }
    return view('song_of_the_day');
})->name('song-of-the-day');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::post('/songs/import', [SongController::class, 'import'])->name('songs.import');

Route::post('/register', [UserController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);
