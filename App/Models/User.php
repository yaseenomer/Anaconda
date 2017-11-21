<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/20/2017
 * Time: 11:15 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'email'];

}