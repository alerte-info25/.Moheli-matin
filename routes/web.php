<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("mohelie")->name("mohelie.")->group(function () {
    Route::get("/login", function () {
        return view("Auth.login");
    })->name("login");

    Route::get("/register", function () {
        return view("Auth.register");
    })->name("register");
});


/*
|--------------------------------------------------------------------------
| Front end Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix("mohelie")->name("mohelie.front.")->group(function () {
    Route::get('/', function () {
        return view('Front.Acceuil.index');
    })->name("acceuil");

    Route::get('/contact', function () {
        return view('Front.Contact.index');
    })->name("contact");

    Route::get('/publicites', function () {
        return view('Front.Publicite.index');
    })->name("publicite");

    Route::get("/sante", function () {
        return view ("Front.Rubriques.sante");
    })->name("sante");

    Route::get("/culture", function () {
        return view ("Front.Rubriques.culture");
    })->name("culture");

    Route::get("/economie", function () {
        return view ("Front.Rubriques.economie");
    })->name("economie");

    Route::get("/opinion", function () {
        return view ("Front.Rubriques.opinion");
    })->name("opinion");

    Route::get("/politique", function () {
        return view ("Front.Rubriques.politique");
    })->name("politique");

    Route::get("/societe", function () {
        return view ("Front.Rubriques.societe");
    })->name("societe");

    Route::get("/sport", function () {
        return view ("Front.Rubriques.sport");
    })->name("sport");

    Route::get("/videos", function () {
        return view ("Front.Videos.index");
    })->name("videos");

    Route::get("/dernieres-infos", function () {
        return view ("Front.LastInfos.index");
    })->name("LastInfos");
});
