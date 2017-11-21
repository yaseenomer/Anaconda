<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 10:53 PM
 */

namespace Bootstrap;


abstract  class Controller
{
    protected $route_parsms = [];


    /**
     * Controller constructor.
     * @param $route_parsms
     */
    public function __construct($route_parsms)
    {
        $this->route_parsms =$route_parsms;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        $method = $name.'Action';
        if (method_exists($this,$method)){
            if ($this->before() !== false){
                call_user_func_array([$this, $method], $arguments);
                $this->after();
            }else{
                echo "Method $method not found in controller".get_class($this);
            }
        }
    }

    /**
     *
     */
    protected function before()
    {

    }


    /**
     *
     */
    protected function after()
    {

    }
}