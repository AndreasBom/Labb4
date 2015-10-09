<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-09
 * Time: 19:27
 */

namespace model;

require_once('DbConnection.php');

class LoginDAL
{
    /**
     * @var array with Userobjects
     */
    private $listOfUsers = array();
    private $db;
    private $connection;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->connection = new DbConnection();
        $this->db = $this->connection->connect();
    }

    /**
     * Add user to array listOfUsers
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->listOfUsers[] = $user;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getUsers()
    {
        //if database connection is null, re-establish a new connection
        if($this->db == null)
        {
            $this->connect();
        }
        $stmt = $this->db->prepare($this->connection->selectUsersSQL());

        if($stmt === false)
        {
            throw new \Exception($this->db->error);
        }

        $stmt->execute();

        $stmt->bind_result($pk, $name, $password);

        while($stmt->fetch())
        {
            $user = new User($name, $password);
            $this->listOfUsers[] = $user;
        }

        //Close db connection and set db to null
        $this->db->close();
        $this->db = null;

        return $this->listOfUsers;
    }


    public function saveUserToDatabase(User $user)
    {
        //if database connection is null, re-establish a new connection
        if($this->db == null)
        {
            $this->connect();
        }
        $stmt = $this->db->prepare($this->connection->insertUserSQL());

        $name = $user->getUsername();
        $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT);

        $stmt->bind_param('ss', $name, $pass);

        $stmt->execute();

        //Close db connection and set db to null
        $this->db->close();
        $this->db = null;
    }
}