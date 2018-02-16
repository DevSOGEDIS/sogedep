<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));
$app['twig'] = $app->extend('twig', function(Twig_Environment $twig, $app)
 {
  $twig->addExtension(new Twig_Extensions_Extension_Text());
  return $twig;
 });
$app->register(new Silex\Provider\AssetServiceProvider(), array('assets.version' => 'v1'));
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array
 (
  'security.firewalls' => array
   (
    'secured' => array
     (
      'pattern' => '^/',
      'anonymous' => true,
      'logout' => true,
      'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
      'users' => function () use ($app)
       {
        return new SOGEDEP\DAO\UserDAO($app['db']);
       },
     ),
    ),
   'security.role_hierarchy' => array
    (
     'ROLE_ADMIN' => array('ROLE_USER'),
    ),
   'security.access_rules' => array
    (
     array('^/dossiers', 'ROLE_ADMIN'),
    ),
   )
 );
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

// Register services.
$app['dao.client'] = function ($app)
 {
  return new SOGEDEP\DAO\ClientDAO($app['db']);
 };

$app['dao.dossier'] = function ($app)
 {
  return new SOGEDEP\DAO\DossierDAO($app['db']);
 };

$app['dao.marque'] = function ($app)
 {
  return new SOGEDEP\DAO\MarqueDAO($app['db']);
 };

$app['dao.prestataire'] = function ($app)
 {
  return new SOGEDEP\DAO\PrestataireDAO($app['db']);
 };

$app['dao.user'] = function ($app)
 {
  return new SOGEDEP\DAO\UserDAO($app['db']);
 };

$app['dao.historique'] = function ($app)
 {
  $historiqueDAO = new SOGEDEP\DAO\HistoriqueDAO($app['db']);
  $historiqueDAO->setDossierDAO($app['dao.dossier']);
  $historiqueDAO->setUserDAO($app['dao.user']);
  return $historiqueDAO;
 };

// Register error handler
$app->error(function (\Exception $e, Request $request, $code) use ($app)
 {
  switch ($code)
   {
    case 403:
     $message = 'Acces interdit.';
     break;

    case 404:
     $message = 'Cette page n\'existe pas.';
     break;

    default:
     $message = 'Ca merdouille.';
    }
   return $app['twig']->render('error.html.twig', array('message' => $message));
 });

// Register JSON data decoder for JSON requests
$app->before(function (Request $request)
 {
  if(0 === strpos($request->headers->get('Content-Type'), 'application/json'))
   {
    $data = json_decode($request->getContent(), true);
    $request->request->replace(is_array($data) ? $data : array());
   }
 }); 