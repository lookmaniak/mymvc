<?php

/**
 * index.php
 * This is an entry point for all our applications. we need to make sure that
 * every request pass through this file.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Define an autoloader function
function myAutoloader($className) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}

// Register the autoloader function
spl_autoload_register('myAutoloader');

/**
 * 
 */
require_once 'app/Routes.php';
