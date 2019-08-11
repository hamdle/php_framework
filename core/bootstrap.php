<?php
/**
 * Load and instantiate resources
 */
require 'database/Connection.php';
require 'core/Router.php';

$routes = [
    '' => 'pages/index.php',
    'login' => 'pages/login.php',
    '404' => 'pages/404.php'
];

$uri = trim($_SERVER['REQUEST_URI'], '/');

$db = new Connection();
$router = new Router($routes);
