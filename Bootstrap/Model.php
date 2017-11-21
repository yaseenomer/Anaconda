<?php
/**
 * Created by PhpStorm.
 * User: yaseen
 * Date: 11/20/2017
 * Time: 4:02 AM
 */

namespace Bootstrap;

use PDO;


class Model
{

    public $dsn = 'mysql:host=localhost;dbname=tee';
    public $user = 'root';
    public $pass = '';
    public $option = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',);
    public $con;
    public $table;


    public function __construct($dsn, $user,$pass,$option,$con,$table)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->pass = $pass;
        $this->option = $option;
        $this->con=$con;
        $this->table=$table;

    }

    public  function connect()
    {


        try {

            $con = new PDO($this->dsn,$this->user, $this->pass, $this->option);
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );


        }
        catch ( PDOException $e) {
            echo 'error connection '.$e->getMessage();
        }
        return $con;


    }
    public function all()
    {


        $stmt =$this->connect()->prepare("SELECT * FROM $this->table");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;

    }
    public function countItem($item)
    {
        $stmt = $this->connect()->prepare("SELECT count($item) FROM $this->table");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

}