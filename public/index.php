<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 10:38 AM
 */
//require '../App/Controllers/Post.php';
//
//
//
//
//
//require '../Bootstrap/Router.php';

//use App\Bootstrap\Router;

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once '../Bootstrap/database.php';



spl_autoload_register(function ($class){
    $root = dirname(__DIR__);
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';



    if (is_readable($file)){
        require  $root.'/'.str_replace('\\','/',$class).'.php';
    }
});




$router = new   Bootstrap\Router();


require '../Router/web.php';








//    echo '<pre>';
//
//    echo htmlspecialchars(print_r($router->getRoutes(),true));
//
//    echo '</pre>';
//
//    $url = $_SERVER['QUERY_STRING'];
//
//    if ($router->match($url)){
//
//        echo '<pre>';
//        var_dump($router->getParams());
//
//
//        echo '</pre>';
//    }else{
//        echo "no route found for url".$url;
//    }



//require '../Bootstrap/App.php';

$router->dispatch($_SERVER['QUERY_STRING']);
//var_dump($router->getParams());








