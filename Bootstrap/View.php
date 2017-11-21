<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/19/2017
 * Time: 11:45 PM
 */

namespace Bootstrap;
use Philo\Blade\Blade;


class View
{
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = "../resuorces/views/$view.php";

        if (is_readable($file)) {
            require $file;
        } else {
            echo "$file not found";
        }
    }

    public static function renderTemplate($template, $args = [])
    {
        $loader = new \Twig_Loader_Filesystem('../resuorces/views');
        $twig = new \Twig_Environment($loader, array());


        echo $twig->render($template, $args);
    }

    public static function makes($view, $args = [])
    {
        $views = '../resuorces/views';
        $cache =  '../resuorces/cache';

        $blade = new Blade($views, $cache);
       echo $blade->view()->make($view, $args)->render();

    }

}