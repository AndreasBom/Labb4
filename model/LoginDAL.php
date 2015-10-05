<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-09
 * Time: 19:27
 */

namespace model;


class LoginDAL
{
    /**
     * @var array with Userobjects
     */
    private $listOfUsers = array();
    private $db;

    public function __construct()
    {
        $this->db = new \mysqli(`localhost`,`admin`,`1234`, `users`);
        //$this->db = new \mysqli("registration-205177.mysql.binero.se","205177_gc34601","paavpg39", "205177-registration");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
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
        //$stmt = $this->db->prepare("SELECT `t`.* FROM `loginapp`.`users` t");
        $stmt = $this->db->prepare("SELECT * FROM `loginapp`.`users`");
        //$stmt = $this->db->prepare("SELECT * FROM `205177-registration`.`users`");
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

        return $this->listOfUsers;
    }

    public function saveUser($user)
    {

        /*$this->addUser($user);
        $users = $this->getUsers();
        $stringData = serialize($users);
        file_put_contents("users.txt", $stringData);*/
    }

    public function saveUserToDatabase(User $user)
    {

        //$stmt = $this->db->prepare("INSERT INTO `login`.`usertable` (`username`, `password`) VALUES (?,?)");
        $stmt = $this->db->prepare("INSERT INTO `205177-registration`.`users` (`username`, `password`) VALUES (?,?)");


        $name = $user->getUsername();
        $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT);

        $stmt->bind_param('ss', $name, $pass);

        $stmt->execute();

    }
}