<?php
namespace views;

class View
{
    public static function render($template, $data = [])
    {
        // Extract the data so that variables are accessible inside the template
        extract($data);

        // Include the template file
        include('views/'. str_replace('.', '/', $template) . '.php');
    }

    public static function patch($layout, $section)
    {
        $layout = str_replace('.', '/', $layout);
        ob_start();
        include(__DIR__ . "/{$layout}.php"); // Assuming your layouts are in the 'views' directory
        return ob_get_clean();
    }
}



