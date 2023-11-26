<?php

namespace controllers;

use views\View;
use models\User;

class HomeController {
    public function index() {
        $title = 'Vulnerable MVC';
        $message = 'you are at home!';
        $user = User::get();

        return View::render('templates.welcome', ['message' => $message, 'user' => $user, 'title' =>  $title]);
    }

    public function profile() {
        $message = 'you are in Profile Page!';
        $user = User::get();

        return View::render('profile', ['message' => $message, 'user' => $user]);
    }

    public function create() {
        echo 'you are creating something';
    }

    public function update() {
        echo 'you are modifying something';
    }

    public function destroy() {
        echo 'becareful, you are attempting to delete something';
    }
}