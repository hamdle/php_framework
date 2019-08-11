<?php
/**
 * Load and instantiate resources
 */
require 'core/env/Loader.php';
require 'core/database/Connection.php';
require 'core/Router.php';

$routes = [
    '' => 'pages/index.php',
    'login' => 'pages/login.php',
    '404' => 'pages/404.php'
];

// Load .env file first
$dotEnv = new Loader();
$dotEnv->load();

$uri = trim($_SERVER['REQUEST_URI'], '/');

$db = new Connection();
$router = new Router($routes);
