<?php

use Symfony\Component\HttpFoundation\Request;

// Homepage
$app->get('/', function () use ($app)
 {
  return $app['twig']->render('site/index.html.twig');
 })->bind('home');

/* $app->get('/passwordgen', function() use ($app)
 {
  $rawPassword = 'test';

  $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789/\\][{}\'";:?.>,<!@#$%^&*()-_=+|';
  $randString = "";
  $randStringLen = 23;
  while(strlen($randString) < $randStringLen)
   {
    $randChar = substr(str_shuffle($charset), mt_rand(0, strlen($charset)), 1);
    $randString .= $randChar;
   }
  $salt = $randString;
  $encoder = $app['security.encoder.bcrypt'];

  $mess = 'Ancien password = '.$rawPassword.'<br />';
  $mess .= 'Salt = '.$salt.'<br />';
  $mess .= 'Password = '.$encoder->encodePassword($rawPassword, $salt);
  return $mess;
 }); */

// Site
$app->get('/entreprise', function () use ($app)
 {
  return $app['twig']->render('site/entreprise.html.twig');
 })->bind('entreprise');

$app->get('/fonctionnement', function () use ($app)
 {
  return $app['twig']->render('site/fonctionnement.html.twig');
 })->bind('fonctionnement');

$app->get('/depannage', function () use ($app)
 {
  return $app['twig']->render('site/depannage.html.twig');
 })->bind('depannage');

$app->get('/charte', function () use ($app)
 {
  return $app['twig']->render('site/charte.html.twig');
 })->bind('charte');

$app->get('/callcenter', function () use ($app)
 {
  return $app['twig']->render('site/callcenter.html.twig');
 })->bind('callcenter');

$app->get('/fonctionnement-callcenter', function () use ($app)
 {
  return $app['twig']->render('site/fonctionnement-callcenter.html.twig');
 })->bind('fonctionnement-callcenter');

$app->get('/contact', function () use ($app)
 {
  return $app['twig']->render('site/contact.html.twig');
 })->bind('contact');

$app->get('/mentions-legales', function () use ($app)
 {
  return $app['twig']->render('site/mentions-legales.html.twig');
 })->bind('mentions-legales');

$app->get('/demande-de-depannage', function (Request $request) use ($app)
 {
  return $app['twig']->render('site/demande-de-depannage.html.twig', array(
   'error' => $app['security.last_error']($request)
  ));
 })->bind('demande-de-depannage'); 

// Clients
$app->get('/clients', function () use ($app)
 {
  $clients = $app['dao.client']->findAll();
  return $app['twig']->render('clients/index.html.twig', array('clients' => $clients));
 })->bind('clients');

$app->get('/client/{id}', function ($id) use ($app)
 {
  $client = $app['dao.client']->find($id);
  return $app['twig']->render('clients/client.html.twig', array('client' => $client));
 })->bind('client');

$app->get('/add/client', function () use ($app)
 {
  return $app['twig']->render('clients/add.html.twig');
 })->bind('addclient');

$app->get('/search/client', function () use ($app)
 {
  return $app['twig']->render('clients/search.html.twig');
 })->bind('searchclient');

// Dossiers
$app->get('/dossiers', function () use ($app)
 {
  $dossiers = $app['dao.dossier']->findAll();
  return $app['twig']->render('dossiers/index.html.twig', array('dossiers' => $dossiers));
 })->bind('dossiers');

$app->get('/dossier/{id}', function ($id) use ($app)
 {
  $dossier = $app['dao.dossier']->find($id);
  $historiques = $app['dao.historique']->findAllByDossier($id);
  return $app['twig']->render('dossiers/dossier.html.twig', array('dossier' => $dossier, 'historiques' => $historiques));
 })->bind('dossier');

$app->get('/add/dossier', function () use ($app)
 {
  return $app['twig']->render('dossiers/add.html.twig');
 })->bind('adddossier');

$app->get('/search/dossier', function () use ($app)
 {
  return $app['twig']->render('dossiers/search.html.twig');
 })->bind('searchdossier');

// Marques
$app->get('/marques', function () use ($app)
 {
  $marques = $app['dao.marque']->findAll();
  return $app['twig']->render('marques/index.html.twig', array('marques' => $marques));
 })->bind('marques');

$app->get('/add/marque', function () use ($app)
 {
  return $app['twig']->render('marques/add.html.twig');
 })->bind('addmarque');

$app->get('/search/marque', function () use ($app)
 {
  return $app['twig']->render('marques/search.html.twig');
 })->bind('searchmarque');

// Prestataires
$app->get('/prestataires', function () use ($app)
 {
  $prestataires = $app['dao.prestataire']->findAll();
  return $app['twig']->render('prestataires/index.html.twig', array('prestataires' => $prestataires));
 })->bind('prestataires');

$app->get('/prestataire/{id}', function ($id) use ($app)
 {
  $prestataire = $app['dao.prestataire']->find($id);
  return $app['twig']->render('prestataires/prestataire.html.twig', array('prestataire' => $prestataire));
 })->bind('prestataire');

$app->get('/add/prestataire', function () use ($app)
 {
  return $app['twig']->render('prestataires/add.html.twig');
 })->bind('addprestataire');

$app->get('/search/prestataire', function () use ($app)
 {
  return $app['twig']->render('prestataires/search.html.twig');
 })->bind('searchprestataire');

// Utilisateurs
$app->get('/utilisateurs', function () use ($app)
 {
  $utilisateurs = $app['dao.user']->findAll();
  return $app['twig']->render('utilisateurs/index.html.twig', array('utilisateurs' => $utilisateurs));
 })->bind('utilisateurs');

$app->get('/utilisateur/{id}', function ($id) use ($app)
 {
  $utilisateur = $app['dao.user']->find($id);
  return $app['twig']->render('utilisateurs/utilisateur.html.twig', array('utilisateur' => $utilisateur));
 })->bind('utilisateur');

$app->get('/add/utilisateur', function () use ($app)
 {
  return $app['twig']->render('utilisateurs/add.html.twig');
 })->bind('addutilisateur');

$app->get('/search/utilisateur', function () use ($app)
 {
  return $app['twig']->render('utilisateurs/search.html.twig');
 })->bind('searchutilisateur');

// Login Form
$app->get('/login', function(Request $request) use ($app)
 {
  return $app['twig']->render('login.html.twig', array(
   'error'         => $app['security.last_error']($request),
   'last_username' => $app['session']->get('_security.last_username'),
  ));
 })->bind('login');