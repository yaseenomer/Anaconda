<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 7:53 PM
 */


namespace App\Controllers;



use Bootstrap\Controller;

class Post extends Controller
{
    public function indexAction()
    {
        echo 'hello from index action in the Post controller';
        echo '<p> Query : <pre>'.
            htmlspecialchars(print_r($_GET, true)).'</pre></p>';
    }
    public function addNewAction()
    {
        echo 'hello from addNew  action in the Post controller';
    }

    public function editAction()
    {
        echo 'hello from edit action in the Post controller';
        echo '<p> Query : <pre>'.
            htmlspecialchars(print_r($this->route_parsms)).'</pre></p>';

    }

}