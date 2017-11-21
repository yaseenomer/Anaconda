<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/16/2017
 * Time: 7:53 PM
 */


namespace App\Controllers;



use Bootstrap\Controller;
use Bootstrap\View;
use App\Models\Post;

class Home extends Controller
{
    public function before()
    {
        echo "(before)";

    }
    public function after()
    {
        echo "(after)";
    }

    public function index()
    {
        //echo 'hello from indexAction action in the Post controller';

//        View::render('home/index',
//            [
//                'name' => 'yaseen',
//                'color' => ['red','blue', 'black']
//            ]);

        $post = new Post();

        $posts =$post->all();
        $count = $post->countItem('id');


       // View::renderTemplate('home/index.blade.php', ['posts' => $posts, 'count' => $count]);
        View::makes('home.index', ['posts' => $posts, 'count' => $count]);





    }

}