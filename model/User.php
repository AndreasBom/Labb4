<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-09
 * Time: 19:38
 */

namespace model;

class NotValidUserNameException extends \Exception{}
class NotValidPasswordException extends \Exception{}
class PasswordDoNotMatchException extends \Exception{}
class UserNameContainingHTMLTagException extends \Exception{}


class User
{
    private $username;
    private $password;

    public function __construct($username, $password, $repeatedPassword)
    {
        if(strlen($username) != strlen(strip_tags($username)))
        {
            throw new UserNameContainingHTMLTagException;
        }
        if(strlen($username) < 3)
        {
            throw new NotValidUserNameException("Not valid");
        }
        if(strlen($password) < 6)
        {
            throw new NotValidPasswordException("Not valid");
        }
        if(strcmp($password, $repeatedPassword) != 0)
        {
            throw new PasswordDoNotMatchException();
        }



        $this->username = $username;
        $this->password = $password;
    }


    public function validateNoHtmlTags($name)
    {
        if(strlen($name) != strlen(strip_tags($name)))
        {
            throw new UserNameContainingHTMLTagException;
        }
    }


    public function validateUsername($username)
    {
        if(strlen($username) < 3)
        {
            throw new NotValidUserNameException("Not valid");
        }

    }

    public function validatePassword($password)
    {
        if(strlen($password) < 6)
        {
            throw new NotValidPasswordException("Not valid");
        }
    }

    public function validateRepetedPassword($password, $repeatedPassword)
    {
        if(strcmp($password, $repeatedPassword) != 0)
        {
            throw new PasswordDoNotMatchException();
        }
    }

    public function saveUser($username, $password)
    {
        $this->dal->saveUser(new User($username, $password));
    }




    /**
     * @return string. Username
     */
    public function getUsername()
    {
        return $this->username;
    }


    /**
     * @return string Password
     */
    public function getPassword()
    {
        return $this->password;
    }



}