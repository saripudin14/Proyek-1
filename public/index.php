<?php
// Single entry point
require_once dirname(__DIR__) . '/app/core/Router.php';
$router = new Router();
$router->dispatch();
