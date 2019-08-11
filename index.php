<?php
/**
 * Entry point of web page
 */

require 'core/bootstrap.php';

require $router->resolve($uri);
