<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 11:12 AM
 */



$router->add('',['controller'=>'Home', 'action'=>'index']);

//$router->add('posts',['controller'=>'Posts', 'action'=>'index']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->add('admin/{controller}/{action}',['namespace' => 'Admin']);

$router->add('user',['controller'=>'Us', 'action'=>'index']);

$router->add('store',['controller'=>'Us', 'action'=>'store']);





//$router->add('admin/{action}/{controller}');
