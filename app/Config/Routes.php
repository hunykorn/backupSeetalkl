<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Pages::accueil');
$routes->get('accueil', 'Pages::accueil');

$routes->get('gestion_utilisateurs', 'Gestion::gestion_utilisateurs', ['filter' => 'AdminGuard']);

$routes->post('supprimer_utilisateur', 'Gestion::postSupprimerUtilisateur', ['filter' => 'AuthGuard']);

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::postLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('inscription', 'Auth::inscription');
$routes->post('inscription', 'Auth::postInscription');

$routes->post('validation/(:any)', 'Auth::postValidation/$1', ['filter' => 'AuthGuard']);

$routes->get('modifier/single/(:any)', 'Gestion::modifierSingle/$1', ['filter' => 'AuthGuard']);
$routes->post('modifier/single/(:any)', 'Gestion::postModifierSingle', ['filter' => 'AuthGuard']);
$routes->get('modifier/(:any)', 'Gestion::modifier/$1', ['filter' => 'AuthGuard']);
$routes->post('modifier/(:any)', 'Gestion::postModifier', ['filter' => 'AuthGuard']);

$routes->get('appel', 'Reunion::appel', ['filter' => 'AuthGuard']);


// Utilisateur
$routes->get('add_contact', 'Pages::add_contact', ['filter' => 'AuthGuard']);
$routes->get('fiche_user', 'Pages::fiche_user', ['filter' => 'AuthGuard']);
$routes->get('creation', 'Pages::creation', ['filter' => 'AuthGuard']);
$routes->get('add_user_img', 'Pages::addImage', ['filter' => 'AuthGuard']);
$routes->post('insert_user_img', 'Pages::addImagePost');

// Réunion
$routes->get('mesreunions', 'Reunion::mesreunions', ['filter' => 'AuthGuard']);
$routes->post('mesreunions', 'Reunion::postMesreunions', ['filter' => 'AuthGuard']);
$routes->get('creer_reunion', 'Reunion::creer_reunion', ['filter' => 'AuthGuard']);
$routes->post('creer_reunion', 'Reunion::postCreer_reunion', ['filter' => 'AuthGuard']);

$routes->get('mentions_legales', 'Pages::mentions_legales');
$routes->get('contact', 'Pages::contact');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
