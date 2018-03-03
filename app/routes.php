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