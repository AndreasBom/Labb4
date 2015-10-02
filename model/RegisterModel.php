<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-10-01
 * Time: 13:44
 */

namespace model;



/*class NotValidUserNameException extends \Exception{}
class NotValidPasswordException extends \Exception{}
class PasswordDoNotMatchException extends \Exception{}
class NotUniqueUserNameException extends \Exception{}
class UserNameContainingHTMLTagException extends \Exception{}*/

use view\LoginView;

class RegisterModel
{
    private $dal;
    private $arrayOfUsers;

    public function __construct()
    {
        $this->dal = new LoginDAL();
        $this->arrayOfUsers = $this->dal->getUsers();
    }

    public function UserNameisUnique($name)
    {
        foreach($this->arrayOfUsers as $user)
        {
            $username = $user->getUsername();
            if(strcmp($username, $name) === 0)
            {
                throw new NotUniqueUserNameException();
            }
        }

        return true;
    }




}