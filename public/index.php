<?php
define('BASE', realpath(dirname(__FILE__) . '/../app'));
require_once BASE . '/config/config.php';
require_once BASE . '/controllers/controller.php';
require_once BASE . '/controllers/ReservationController.php';

// Mapa akcji do kontrolerów

$controllers = [
  'showAllReservations' => 'ReservationController',
  'workerpanel' => 'ReservationController',
  'adminpanel' => 'ReservationController',
  'deleteReservation' => 'ReservationController',
  'createReservation' => 'ReservationController',
  'createForm' => 'ReservationController',
  'showUserReservations' => 'ReservationController',
  'showReservationDetails' => 'ReservationController',
  'toggleRoomStatus' => 'ReservationController',
  'register' => 'Controller',
  'login' => 'Controller',
  'panelworker' => 'Controller',
  'paneladmin' => 'Controller',
  'panel' => 'Controller',
  'editU' => 'Controller',
  'deleteUser' => 'Controller',
  'searchClients' => 'Controller',
  'home' => 'Controller',
  'showUserData' => 'Controller',
  'logout' => 'Controller',
  'editProfile' => 'Controller',
  'loginForm' => 'Controller',
];



$action = $_GET['action'] ?? 'home';
$controllerClass = $controllers[$action] ?? 'Controller';


$controller = new $controllerClass();
$controller->handleRequest();
?>


