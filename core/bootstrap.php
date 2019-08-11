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
    'admin' => 'pages/admin.php',
    '404' => 'pages/404.php'
];

// Load .env file first
$dotEnv = new Loader();
$dotEnv->load();

// Get the URI for the router to resolve
$uri = trim($_SERVER['REQUEST_URI'], '/');

$db = new Connection();
$router = new Router($routes);
