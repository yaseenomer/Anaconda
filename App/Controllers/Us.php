<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/20/2017
 * Time: 11:17 PM
 */

namespace App\Controllers;

use Illuminate\Database\Capsule\Manager as Capsule;


use App\Models\User;
use Bootstrap\Controller;
use Bootstrap\View;
use Faker\Factory as F;



class Us extends Controller
{

    public function index()
    {
        $user= new User();
        $users = $user::all();
        View::makes('user.index', ['users' => $users]);
    }
    public function createTable()
    {
        Capsule::schema()->create('users', function ($table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();

        });
    }
    public function insert()
    {
        $faker = new F;
        $faker = $faker::create();
        $user = new User();

       $user->name = $faker->name;
       $user->email = $faker->email;
       $user->save();
    }

    public function show($id)
    {

        $user= new User();
       $user = $user::find($id);
        View::makes('user.show', ['user' =>$user]);

    }
    public function create()
    {
        View::makes('user.new');
    }
    public function store()
    {
        $user = new User();
        $user->name =$_POST['name'];
        $user->email =$_POST['email'];
        $user->save();
        $this->redirect();

    }
    public function redirect()
    {
        return  header('location: http://localhost/te/public/user');
    }
    public function delete($id)
    {

        $user= new User();

        $user::find($id)->delete();

        return $this->redirect();

    }

}