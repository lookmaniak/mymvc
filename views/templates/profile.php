<?php

require_once __DIR__ . '/../app/libs/lib_view.php';

$content = h('html', [
    h('head', [
        h('title', 'Main layout!')
    ]),
    h('body', [
        h('div.navbar.navbar-light.#myNavbar', [
            h('h1', 'Hello!' . $user['name'])
        ])
    ])
]);

echo $content;
