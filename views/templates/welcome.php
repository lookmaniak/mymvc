<?php
use views\View;

include __DIR__ . '/../../libs/lib_view.php';

$content = h(
    'button.btn.btn-sm#myButton[type="button"]', 
    [ 'class' => 'btn-primary btn-icon', 'onclick' => 'some function'], 
    [$message , h('a.link.btn-link', [ 'href' => 'somepath'], 'Link name')]
);

echo View::patch('templates.layouts', [
    'title' => $title,
    'content' => $content,
]);