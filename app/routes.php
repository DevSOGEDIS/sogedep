<?php

use Symfony\Component\HttpFoundation\Request;

// Home page
$app->get('/', function () use ($app)
 {
  return $app['twig']->render('index.html.twig');
 })->bind('home');

// Login form
$app->get('/login', function(Request $request) use ($app)
 {
  return $app['twig']->render('login.html.twig', array(
        'error'         => $app['security.last_error']($request),
        'last_username' => $app['session']->get('_security.last_username'),
  ));
 })->bind('login');

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


// Extra pages

$app->get('/passwordgen', function() use ($app)
 {
  $rawPassword = 'simla';

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
 });