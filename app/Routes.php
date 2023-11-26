<?php

namespace app;

use app\Request;
use controllers\HomeController;

Request::handler(HomeController::class, [
    'get:/' => 'index',
    'get:/profile' => 'profile',
    'post:/' => 'create',
    'put:/' => 'update',
    'delete:/' => 'destroy',
]);