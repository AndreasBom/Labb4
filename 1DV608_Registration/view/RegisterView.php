<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-30
 * Time: 20:40
 */

namespace view;
require_once('IView.php');

use model\NotValidPasswordException;
use model\NotValidUserNameException;
use model\PasswordDoNotMatchException;
use model\NotUniqueUserNameException;
use model\RegisterModel;
use model\UserNameContainingHTMLTagException;


class RegisterView implements IView
{

    private static $messageId = "RegisterView::Message";
    private static $name = "RegisterView::UserName";
    private static $password = "RegisterView::Password";
    private static $repeatPassword = "RegisterView::PasswordRepeat";
    private static $register = "RegisterView::RegisterUser";
    private static $SessionUserName = "RegisterView::SessionUsername";
    private static $succsessfullRegistration = "RegisterView::SuccsessfullRediret";

    private $message;
    private $SessionUsername;
    //private $cookeStorage;

    public function __construct()
    {
        //$this->cookeStorage = new CookieStorage();
    }

    public function getUserClient() {
        return new \model\UserClient($_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_USER_AGENT"]);
    }


    public function didUserTryToRegister()
    {
        return isset($_POST[self::$register]);
    }

    public function getUsername()
    {
        if(isset($_POST[self::$name]))
        {
            $_SESSION[self::$SessionUserName] = $_POST[self::$name];

            return $_POST[self::$name];
        }
        return '';
    }

    public function getPassword()
    {
        if(isset($_POST[self::$password]))
        {
            return $_POST[self::$password];
        }
        return '';

    }

    public function getRepeatPassword()
    {
        if(isset($_POST[self::$repeatPassword]))
        {
            return $_POST[self::$repeatPassword];
        }
        return '';
    }

    //Validates input and if valid creates a new User
    public function getUserObject()
    {
        $username = $this->getUsername();
        $password = $this->getPassword();
        $repeatedPassword = $this->getRepeatPassword();

        //Checks if password and repeated password is identical
        //I think this is a view responsibility, since the user makes a typo in either field
        if(strcmp($password, $repeatedPassword) != 0)
        {
            $this->message .= "Passwords do not match.";
            return null;
        }


        try
        {
            return new \model\User($username, $password);
        }
        catch (NotValidUserNameException $ex)
        {
            $this->message .= "Username has too few characters, at least 3 characters.<br/>";
        }
        catch (NotValidPasswordException $ex)
        {
            $this->message .= "Password has too few characters, at least 6 characters.<br/>";
        } catch (PasswordDoNotMatchException $ex) {
            $this->message .= "Passwords do not match.<br/>";
        } /*catch(NotUniqueUserNameException $ex)
        {
            $this->message .= "User exists, pick another username.";
        }*/
        catch (UserNameContainingHTMLTagException $ex)
        {
            $this->message .= "Username contains invalid characters.";
        }

        return null;
    }

    public function redirectSuccessfulLogin()
    {
        $this->cookeStorage->save(self::$succsessfullRegistration, "Registration new user.");
        header("Location: " .$_SERVER["PHP_SELF"]);
    }

    public function isSuccessfullRegistration()
    {
        if($this->cookeStorage->load(self::$succsessfullRegistration))
        {

            return true;
        }

        return false;
    }

    public function registrationMessage()
    {
        return $this->cookeStorage->loadAndRemove(self::$succsessfullRegistration);
    }



    public function message($string)
    {

        $this->message = $string;
    }


    public function response()
    {
        $message = $this->message;

        $response = $this->generateRegistrationFormHTML($message);

        return $response;
    }

    private function generateRegistrationFormHTML($message) {
        return '
            <h2>Register new user</h2>
			<form method="post" class="form">
				<fieldset>
					<legend>Register a new user - Write Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>

					<label for="' . self::$name . '">Username :</label>
					<input type="text" class="input" id="' . self::$name . '" name="' . self::$name . '" value="'. $this->getRequestUserName() .'"  />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" class="input" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$repeatPassword . '">Repeat password :</label>
					<input type="password" class="input" id="' . self::$repeatPassword . '" name="' . self::$repeatPassword . '" />

					<input type="submit" class="btn" name="' . self::$register . '" value="Register" />
				</fieldset>
			</form>
		';
    }

    private function getRequestUserName() {
        //RETURN REQUEST VARIABLE: USERNAME
        if(isset($_SESSION[self::$SessionUserName])){
            return strip_tags($_SESSION[self::$SessionUserName]);
        }
        return '';
    }


}