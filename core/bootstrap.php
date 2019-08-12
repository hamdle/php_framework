<?php
/**
 * Load and instantiate resources to build page
 */

require 'core/env/Loader.php';
require 'core/database/Connection.php';
require 'core/Router.php';

// Load .env file first
$dotEnv = new Loader();
$dotEnv->load();

// Get the URI for the router to resolve
$uri = trim($_SERVER['REQUEST_URI'], '/');

$db = new Connection();
$routes = [
    '' => 'pages/index.php',
    'login' => 'pages/login.php',
    'logout' => 'pages/logout.php',
    'admin' => 'pages/admin.php',
    '404' => 'pages/404.php'
];
$router = new Router($routes);

// Set page vars
$pageTitle = $_SERVER['REQUEST_URI'];
$pageTitle = strip_tags($pageTitle);
$pageTitle = htmlspecialchars($pageTitle);
$pageTitle = str_replace('/', '', $pageTitle);
$pageTitle = ucfirst($pageTitle);
$pageTitle = $pageTitle == '' ? 'Home' : $pageTitle;
$pageURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
