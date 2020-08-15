<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
test route
*/
Route::get('ajax', function () {
    return view('front_office.emails.envoyerEmail');
})->name('ajax');


/*
Accueil
*/
Route::get('/', 'crm\AccueilController@index')->name('CRMaccueil');
Route::get('accueil/destroy/{activite}', 'crm\AccueilController@destroy')->name('accueil.activite.annuler');
Route::any('accueil/Terminer/{activite}', 'crm\AccueilController@marquerCommeTermine')->name('accueil.activite.terminer');
Route::post('accueil/creer', 'crm\AccueilController@storeActivite')->name('accueil.activite.ajouter');
Route::post('accueil/update/{activite}', 'crm\AccueilController@updateActivite')->name('accueil.activite.modifier');
Route::get('modifier/{activite}', 'crm\AccueilController@ajaxModifier')->name('modifier.activite');
Route::post('accueil/create', 'crm\AccueilController@storeLien')->name('accueil.lien.ajouter');
Route::get('accueil/annuler/{lien}', 'crm\AccueilController@destroyLien')->name('accueil.lien.annuler');

Route::get('/ajouter', function () {
    return view('front_office.accueil.ajouter_activite', ['clients' => App\models\clients::All()]);
})->name('ajouter.activite');

/*
Mes Activites
*/
Route::get('MesActivites', 'crm\mesActivitesController@index')->name('MesActivites');
/*
Clients
*/
Route::get('Clients', 'crm\ClientsController@index')->name('Clients');
Route::get('historique/{client}/{scorecheck}/{scoreNocheck}', 'crm\ClientsController@HistoriqueClient')->name('historique.client');
Route::post('ajouterActivite/{client}', 'crm\ClientsController@StoreActiviteClient')->name('AjouterActivite.client');
Route::post('ajouter/commentaire/{client}', 'crm\ClientsController@storeComment')->name('Client.ajouter.commentaire');
/*
Prospects
*/
Route::get('Prospects', 'crm\ProspectsController@index')->name('Prospects');
/*
Our_team
*/
Route::get('Our_team', 'crm\OurTeamController@index')->name('OurTeam');
Route::post('Ourteam/contacter/{membre}', 'crm\OurTeamController@EnvoyerMsg')->name('Envoyer.msg');
/*
emails
*/

Route::get('email', 'crm\sendEmailController@sendEmailReminder')->name('send.email');
/*
LOGIN
*/
Route::get('login', 'CRM\AdminController@showLoginForm')->name('login');
Route::post('login/process', 'CRM\AdminController@processLoginAdmin')->name('login/process');
Route::get('logout', 'CRM\AdminController@logout')->name('logout');
Route::get('/hom', 'DashboardController@index')->name('home');









/*
CLIENT
*/
Route::resource('client', 'crm\ClientController');
Route::post('client/{id}/update', 'crm\ClientController@update');
Route::any('client/{id}/update', 'crm\ClientController@update');


/*
EMPLOYE
*/
Route::resource('employe', 'crm\EmployesController');
Route::post('employe/{id}/update', 'crm\EmployesController@update');
Route::any('employe/{id}/update', 'crm\EmployesController@update');

/*
TASKS

Route::resource('tasks', 'crm\TasksController');
*/
Route::get('events', 'crm\EventController@index')->name('events.index');
Route::post('events', 'crm\EventController@addEvent')->name('events.add');
/* EVENT */
Route::resource('eventList', 'EventListController');
Route::post('eventList/{id}/update', 'EventListController@update');
Route::any('eventList/{id}/update', 'EventListController@update');


