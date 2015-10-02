<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-09
 * Time: 19:44
 */

namespace helpers;

require_once("./model/User.php");
require_once("./model/LoginDAL.php");
use model\LoginDAL;
use model\User;

class config
{

    /**
     * Set up configuration. Add User obj. to array in LoginDAL and saves to file
     */
    public function __construct()
    {
        $user1 = new User("Andreas", "123456", "123456");
        $user2 = new User("JanneBannan", "abcdef", "abcdef");
        $user3 = new User("Admin", "Password", "Password");
        $user4 = new User("BlaBla", "PaSsWoRd", "PaSsWoRd");
        $user5 = new User("aaa","bbbbbb", "bbbbbb");

        $dal = new LoginDAL();
        $dal->addUser($user1);
        $dal->addUser($user2);
        $dal->addUser($user3);
        $dal->addUser($user4);
        $dal->addUser($user5);

        $users = $dal->getUsers();
        $this->save($users);
    }

    /**
     * @param $objToSave
     */
    private function save($objToSave)
    {
        $stringData = serialize($objToSave);
        file_put_contents("users.txt", $stringData);
    }
}