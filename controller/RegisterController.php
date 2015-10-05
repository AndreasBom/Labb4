<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-10-01
 * Time: 13:42
 */

namespace controller;


use model\NotValidPasswordException;
use model\NotValidUserNameException;
use model\PasswordDoNotMatchException;
use model\NotUniqueUserNameException;
use model\RegisterModel;
use model\UserNameContainingHTMLTagException;
use view\RegisterView;

class RegisterController
{
    private $model;
    private $regView;

    public function __construct(RegisterModel $model, RegisterView $regView)
    {
        $this->model = $model;
        $this->regView = $regView;
    }

    public function doRegister()
    {

        if($this->regView->didUserTryToRegister())
        {

            $userObject = $this->regView->getUserObject();
            if($userObject != null)
            {
                try
                {
                    $this->model->saveUser($userObject);

                    $this->regView->redirectSuccessfulLogin();
                }
                catch (\Exception $ex)
                {
                    $this->regView->notUniqueUsername();
                }
            }


        }


    }

}