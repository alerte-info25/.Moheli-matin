<?php

use App\Http\Controllers\Admin\PubliciteController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Back\Dashboard\CommuniqueController;
use App\Http\Controllers\Back\Dashboard\EventController;
use App\Http\Controllers\Back\Dashboard\NewsletterController;
use App\Http\Controllers\Back\Dashboard\ParticipantController;
use App\Http\Controllers\Back\Dashboard\PubliciteController as DashboardPubliciteController;
use App\Http\Controllers\Back\Dashboard\RedacteurController;
use App\Http\Controllers\Back\Dashboard\sondageController;
use App\Http\Controllers\Back\Dashboard\StoreArticleController;
use App\Http\Controllers\Back\Dashboard\StorePodcastAudioController;
use App\Http\Controllers\Back\Dashboard\StorePodcastVideoController;
use App\Http\Controllers\Back\Dashboard\StoreProgrammeController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\Acceuil\AcceuilController;
use App\Http\Controllers\Front\Communiques\CommuniquesController;
use App\Http\Controllers\Front\Contact\UserContactController;
use App\Http\Controllers\Front\Newsletter\NewsletterController as NewsletterNewsletterController;
use App\Http\Controllers\Front\Rubriques\RubriquesController;
use App\Http\Controllers\Front\User\ClientController;
use App\Http\Controllers\Front\User\UserAbonneController;
use App\Http\Controllers\Front\Videos\UserVideoController;
use App\Http\Controllers\UserCommentController;
use Illuminate\Support\Facades\Route;



















/*
|--------------------------------------------------------------------------
| Back end Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix("dashboard/moheli")
    ->name("dashboard.")
    ->middleware(['auth', 'role:admin,redacteur'])
    ->group(function () {

        // gestion des podcasts audios
        Route::get("/audios", [StorePodcastAudioController::class, "index"])->name("audios");
        Route::post("/audios", [StorePodcastAudioController::class, "store"])->name("audios.store");
        Route::get("/audiosList", [StorePodcastAudioController::class, "render"])->name("audiosList");
        Route::delete("/audiosList/{audio}", [StorePodcastAudioController::class, "destroy"])->name("audio.destroy");
        Route::get("/audiosList/{audio}/edit", [StorePodcastAudioController::class, "edit"])->name("audios.edit");
        Route::put("/audiosList/{audio}", [StorePodcastAudioController::class, "update"])->name("audios.update");

        // gestion des podcasts videos
        Route::get("/videos", [StorePodcastVideoController::class, "index"])->name("videos");
        Route::post("/videos", [StorePodcastVideoController::class, "store"])->name("videos.store");
        Route::get("/videosList", [StorePodcastVideoController::class, "render"])->name("videosList");
        Route::delete("/videosList/{video}", [StorePodcastVideoController::class, "destroy"])->name("videos.destroy");
        Route::get("/videos/{video}/edit", [StorePodcastVideoController::class, "edit"])->name("videos.edit");
        Route::put("/videos/{video}", [StorePodcastVideoController::class, "update"])->name("videos.update");

        // gestion des articles
        Route::get("/articles", [StoreArticleController::class, "index"])->name("articles");
        Route::get("/articlesList", [StoreArticleController::class, "render"])->name("articlesListe");
        Route::get("/articles/{article}/edit", [StoreArticleController::class, "edit"])->name("articles.edit");
        Route::post("/articles", [StoreArticleController::class, "store"])->name("articles.store");
        Route::put("/articles/{article}", [StoreArticleController::class, "update"])->name("articles.update");
        Route::delete("/articles/{article}", [StoreArticleController::class, "destroy"])->name("articles.destroy");

        // gestion des programmes
        Route::get("/programmes", [StoreProgrammeController::class, "index"])->name("programmes");
        Route::get("/programmesList", [StoreProgrammeController::class, "render"])->name("programmesList");
        Route::post("/programmes", [StoreProgrammeController::class, "store"])->name("programmes.store");
        Route::get("/programmes/edit", [StoreProgrammeController::class, "edit"])->name("programmes.edit");
        Route::delete("/programmes/{programme}", [StoreProgrammeController::class, "destroy"])->name("programmes.destroy");
        Route::put("/programmes/{programme}/update", [StoreProgrammeController::class, "render"])->name("programmes.update");

        // gestion des newsletters
        Route::get("/newsletters", [NewsletterController::class, "index"])->name("newsletters");
        Route::post("/newsletters", [NewsletterController::class, "store"])->name("newsletters.store");
        Route::get("/newslettersListe", [NewsletterController::class, "render"])->name("newslettersListe");

        // liste des abonnées à la newsletter
        Route::get("/abonnes", [UserAbonneController::class, "index"])->name("abonnes");

        // liste des inscrits
        Route::get("/inscrits", [ClientController::class, "render"])->name("inscrits");

        // gestion des sondages
        Route::get("/sondages", [sondageController::class, "index"])->name("sondages");
        Route::post("/sondages", [sondageController::class, "store"])->name("sondages.post");
        Route::get("/sondagesListe", [sondageController::class, "render"])->name("sondagesListe");
        Route::delete("/sondagesListe/{sondage}", [sondageController::class, "delete"])->name("sondage.delete");

        // gestion des redacteurs
        Route::get("/redacteurs", [RedacteurController::class, 'form'])->name("redacteurs");
        Route::post("/redacteurs", [RedacteurController::class, 'store'])->name("redacteurs.post");
        Route::get("/redacteursListe", [RedacteurController::class, 'render'])->name("redacteursListe");
        Route::delete("/redacteursListe/{redacteur}", [RedacteurController::class, 'delete'])->name("redacteur.delete");

        // Routes CRUD standards
        Route::resource('publicites', DashboardPubliciteController::class);
        
        // Routes pour la gestion des statuts
        Route::patch('publicites/{publicite}/activate', [DashboardPubliciteController::class, 'activate'])
            ->name('publicites.activate');
        
        Route::patch('publicites/{publicite}/deactivate', [DashboardPubliciteController::class, 'deactivate'])
            ->name('publicites.deactivate');
        
        Route::patch('publicites/{publicite}/expire', [DashboardPubliciteController::class, 'expire'])
            ->name('publicites.expire');
        
        Route::patch('publicites/{publicite}/status', [DashboardPubliciteController::class, 'updateStatus'])
            ->name('publicites.update-status');

        // Route pour la mise à jour automatique (optionnelle, pour un cron)
        Route::post('publicites/auto-update-status', [DashboardPubliciteController::class, 'autoUpdateStatus'])
            ->name('publicites.auto-update-status');

        // gestion des communiques
        Route::get("/communiques", [CommuniqueController::class, "index"])->name("communiques");
        Route::get("/communiques/liste", [CommuniqueController::class, "liste"])->name("communiques.liste");
        Route::post('communiques', [CommuniqueController::class, 'store'])->name('communiques.store');
        Route::delete('communiques/{communique:slug}', [CommuniqueController::class, 'destroy'])->name('communiques.destroy');
        Route::get('communiques/{communique:slug}', [CommuniqueController::class, 'show'])->name('communiques.show');

});

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

// Route::prefix("moheli")->name("moheli.")->group(function () {
//     Route::get("/login", function () {
//         return view("Auth.login");
//     })->name("login");

//     Route::get("/register", function () {
//         return view("Auth.register");
//     })->name("register");
// });

Route::prefix("moheli")
    ->controller(AuthController::class)
    ->name("moheli.")
    ->group(function () {

    Route::get('/login', "showLoginForm")->name("login")->middleware('guest');
    Route::post('/login', "login")->name("login.post")->middleware('guest');
    Route::get('/register', "showRegisterForm")->name("register")->middleware('guest');
    Route::post('/register', "register")->name("register.post")->middleware('guest');
    Route::post("/logout", "logout")->name("logout");

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

// Acceuil et actualites
Route::get('/', [AcceuilController::class, 'index'])->name("moheli.front.acceuil");
Route::get('/moheli/detail-actualite/{slug}', [AcceuilController::class, "render"])->name("moheli.front.detail-article");
// articles sauvegardés
Route::post('/moheli/article/{article}/toggle-save', [AcceuilController::class, 'toggleSave'])->name('moheli.article.toggleSave');
Route::get("/moheli/articles-sauvegarde/", [AcceuilController::class, "asSaved"])->name("moheli.articles.save");
// fin articles sauvegardés
Route::get("/moheli/dernieres-infos", [AcceuilController::class, "lastInfos"])->name("moheli.front.LastInfos");
Route::get('/moheli/recherche', [AcceuilController::class, 'search'])->name('moheli.front.search');
Route::post('/moheli/comments', [UserCommentController::class, "store"])->name("moheli.comments.store");

// videos
Route::get("/moheli/videos", [UserVideoController::class, 'index'])->name("moheli.front.videos");
Route::get("/moheli/detail-video/{slug}", [UserVideoController::class, 'render'])->name("moheli.front.detail-video");

// formulaire de contact
Route::get('/moheli/contact', [UserContactController::class, "index"])->name("moheli.front.contact");
Route::post('/moheli/contact', [UserContactController::class, "store"])->name("moheli.front.contact.store");

// rubriques
Route::get("/moheli/rubriques/{slug}", [RubriquesController::class, "index"])
    ->where('slug', 'societe|sante|politique|culture|economie|opinion|sport|communication')
    ->name("moheli.front.rubrique");

// Newsletters routes
Route::post('/newsletters', [NewsletterNewsletterController::class, "store"])->name("moheli.newsletters.store");

// Communiques route
Route::get("/moheli/communiques", [CommuniquesController::class, "index"])->name("moheli.front.communique");
Route::get("/moheli/communiques/{slug}/detail", [CommuniquesController::class, "show"])->name("moheli.front.communique.show");