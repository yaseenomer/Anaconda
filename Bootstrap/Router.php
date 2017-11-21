<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 10:50 AM
 */

namespace Bootstrap;


class Router
{

    protected $routes =[];

    protected $params =[];




    /**
     * @param $route
     * @param $params
     */
    public function add($route, $params =[])
  {
      //convert the route to a regular expression escape forward slash

      $route = preg_replace('/\//','\\/', $route);

      //convert variable e.g. {controller}

      $route = preg_replace('/\{([a-z]+)\}/','(?P<\1>[a-z]+)',$route);

      //convert variable with custom regular expression

      $route=preg_replace('/\{([a-z]+):([^\}]+)\}/','(?P<\1>\2)', $route);

      //add start and end delimiters and case insensitive flag

      $route = '/^'.$route.'$/i';

      $this->routes[$route]=$params;

  }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    public function match($url)
    {
       /* foreach ($this->routes as $route => $params)
        {
            if ($url == $route)
            {
                $this->params =$params;
                return true;
            }

        }
        return false;
       */

       //$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        foreach ($this->routes as $route => $params) {


            if (preg_match($route, $url, $matches)) {


                //get named capture group value
                //$params = [];

                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;

    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $url
     */
    public function dispatch($url)
    {

        $url = $this->removeQueryStringVariables($url);
        if ($this->match($url)) {

           $controller = $this->params['controller'];

           $controller = $this->convertToStudlyCape($controller);

           //$controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace().$controller;

           if (class_exists($controller)){

               $controller_object = new $controller($this->params);

               $action = $this->params['action'];
               $action = $this->convertToCamelCase($action);






               if (is_callable([$controller_object, $action])){
                   if (isset($this->params['id'])){
                       $id=$this->params['id'];
                   }else{
                       $id = [];
                   }





                    $controller_object->$action($id);

               }else{
                   echo "Method $action (in $controller) not found";
               }
           }else{
               echo "Controller class $controller not found";
           }


       }else{
           echo 'not route matched';
       }
    }
    public function convertToStudlyCape($string)
    {
        return str_replace(' ','',ucwords(str_replace('-', ' ', $string)));
    }

    public function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCape($string));
    }

    protected function removeQueryStringVariables($url)
    {
        if ($url != ''){
            $parts = explode('&', $url, 2);
            if (strpos($parts[0], '=') === false){
                $url = $parts[0];
            }else{
                $url = '';
            }
        }
        return $url;
    }
    public function getNamespace()
    {
        $namespace = 'App\Controllers\\';
        if (array_key_exists('namespace', $this->params)){
            $namespace .= $this->params['namespace'].'\\';
        }
        return $namespace;
    }
}