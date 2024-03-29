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
    return view('front_office.MesActivites.test_ajax');
})->name('ajax_route');



/*
-----FONT_OFFICE---------
*/

/*
LOGIN
*/
Route::get('login', 'CRM\AdminController@showLoginForm')->name('login');
Route::post('login/process', 'CRM\AdminController@processLoginAdmin')->name('login/process');
Route::get('logout', 'CRM\AdminController@logout')->name('logout');
Route::post('login/update', 'CRM\AdminController@changerParametres')->name('login.update');
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
    return view('front_office.accueil.ajouter_activite');
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
Route::get('historiqueP/{prospect}', 'crm\ProspectsController@HistoriqueProspect')->name('historique.prospect');
Route::post('ajouter/commantaire/{prospect}', 'crm\ProspectsController@storeComment')->name('prospect.ajouter.commentaire');
/*
Our_team
*/
Route::get('Our_team', 'crm\OurTeamController@index')->name('OurTeam');
Route::post('Ourteam/contacter/{id}/{role}', 'crm\OurTeamController@EnvoyerMsg')->name('Envoyer.msg');
/*
emails
*/
Route::get('mail/{client_id}/{prospect_id}/{produit_id}/{promo_id}/{event_id}/{reclam_id}/{activite_id}/{type}', 'crm\sendEmailController@index')->name('index.emails');
Route::post('ckeditor/image_upload', 'crm\sendEmailController@upload')->name('upload');
Route::post('rediger/email/{type}/{id_type}', 'crm\sendEmailController@redigerEmail')->name('rediger.email');
Route::get('email', 'crm\sendEmailController@sendEmail')->name('send.email');
/*
Mes conversations
*/
// 1- conversation client
Route::get('mesConversations', 'crm\mesConversationsController@index')->name('mesConversation');
Route::get('conversation/client/{client}', 'crm\mesConversationsController@conversationClient')->name('conversation.client');
Route::get('conversation/delete/{email_destroy}', 'crm\mesConversationsController@suppConversation')->name('conversation.supprimer');
// 2- conversation equipe
Route::get('ConversationsEquipe', 'crm\equipeConversationController@index')->name('Conversation.equipe');
Route::get('conversation/employe/{employe}', 'crm\equipeConversationController@conversationEmploye')->name('conversation.employe');
Route::get('conversation/supprimer/{employe}', 'crm\equipeConversationController@suppConversation')->name('conversation.client.supprimer');
//3- conversation prospect
Route::get('ConversationsProspect', 'crm\prospectConersationController@index')->name('Conversation.prospect');
Route::get('conversation/prospect/{prospect}', 'crm\prospectConersationController@conversationProspect')->name('conversation.prospect');
Route::get('conversation/supprimer/{email_destroy}', 'crm\prospectConersationController@suppConversation')->name('conversation.prospect.supprimer');



/*
-----BACK_END---------
*/

/* index */
Route::get('admin/home', 'admin\dashboardController@index')->name('admin.home');
/* Employes */
Route::get('employes', 'admin\EmployeController@index')->name('Employees');
Route::post('employes/update/{employe}', 'admin\EmployeController@update')->name('admin.modifier.employe');
Route::get('employe/destroy/{employe}', 'admin\EmployeController@destroy')->name('admin.supprimer.employe');
Route::post('employe/creer', 'admin\EmployeController@storeEmploye')->name('admin.ajouter.employe');
/* Clients */
Route::get('Admin/Clients', 'admin\ClientController@index')->name('list.clients');
Route::get('Admin/clients/Historique/{client}/{scorecheck}/{scoreNocheck}', 'admin\ClientController@HistoriqueClient')->name('admin.historique.client');
Route::post('Admin/Ajouter/Clients', 'admin\ClientController@storeClient')->name('admin.ajouter.client');
Route::post('client/update/{client}', 'admin\ClientController@updateClient')->name('admin.modifier.client');
Route::get('client/destroy/{client}', 'admin\ClientController@destroy')->name('admin.supprimer.client');
/* Prospect */
Route::get('Admin/prospect', 'admin\ProspectController@index')->name('list.prospects');
Route::post('Admin/Ajouter/prospect', 'admin\ProspectController@storeProspect')->name('admin.ajouter.prospect');
Route::post('prospect/update/{prospect}', 'admin\ProspectController@updateProspect')->name('admin.modifier.prospect');
Route::get('prospect/destroy/{prospect}', 'admin\ProspectController@destroy')->name('admin.supprimer.prospect');
/* Produits */
Route::get('Admin/produit', 'admin\ProduitController@index')->name('list.produits');
/* Promotions */
Route::get('Admin/promotion', 'admin\PromotionController@index')->name('list.promotions');
Route::post('Admin/Ajouter/promotion', 'admin\PromotionController@storePromotion')->name('admin.ajouter.promotion');
Route::post('promotion/update/{promotion}', 'admin\PromotionController@updatePromotion')->name('admin.modifier.promotion');
Route::get('promotion/destroy/{promotion}', 'admin\PromotionController@destroy')->name('admin.supprimer.promotion');
/* Evenements */
Route::get('Admin/evenement', 'admin\EvenementController@index')->name('list.evenements');
Route::post('Admin/Ajouter/evenement', 'admin\EvenementController@storeEvenement')->name('admin.ajouter.evenement');
Route::post('evenement/update/{evenement}', 'admin\EvenementController@updateEvenement')->name('admin.modifier.evenement');
Route::get('evenement/destroy/{evenement}', 'admin\EvenementController@destroy')->name('admin.supprimer.evenement');
/* Actions Marketing */
Route::get('Admin/actionMarketing', 'admin\actionMarketingController@index')->name('list.actionMarketing');
Route::post('actionMarketing/update/{action}', 'admin\actionMarketingController@updateActionMarketing')->name('admin.modifier.actionMarketing');
Route::post('definirParametres', 'admin\actionMarketingController@updateParametres')->name('definir_parametres');


