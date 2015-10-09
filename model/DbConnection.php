<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-10-09
 * Time: 09:46
 */

namespace model;

require_once('./helpers/config.php');

use helpers\config;

class DbConnection
{
    private $db;
    private $typeOfConnection;

    public function __construct()
    {
        switch(config::DATASOURCE)
        {
            //Change databse connection in config.php
            case "local":
                $this->connectLocal();
                break;
            case "remote":
                $this->connectRemote();
                break;
        }


    }


    public function connect()
    {
        return $this->db;
    }


    public function establishConnection()
    {
        $this->db = new \mysqli(config::SERVER, config::USERNAME, config::PASSWORD, config::DATABASE);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
    }

    private function connectRemote()
    {
        $this->establishConnection();
        $this->typeOfConnection = "remote";
    }


    private function connectLocal()
    {
        $this->establishConnection();
        $this->typeOfConnection = "local";
    }

    public function selectUsersSQL()
    {
        switch($this->typeOfConnection)
        {
            case "remote":
                return "SELECT * FROM  `users`";
            case "local":
                return "SELECT * FROM loginapp.users";
            default:
                return "";
        }
    }

    public function insertUserSQL()
    {
        switch($this->typeOfConnection)
        {
            case "remote":
                return "INSERT INTO `users` (`username`, `password`) VALUES (?,?)";
            case "local":
                return "INSERT INTO loginapp.users (username, password) VALUES (?,?)";
            default:
                return "";
        }
    }

}