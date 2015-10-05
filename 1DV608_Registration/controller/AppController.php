<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-10-04
 * Time: 12:39
 */

namespace controller;

require_once('./controller/RegisterController.php');
require_once('./model/RegisterModel.php');
require_once('./view/RegisterView.php');


class AppController
{
    public function run()
    {

        //CREATE OBJECTS OF THE VIEWS
/*        $loginM = new \model\LoginModel();
        $dtv = new \view\DateTimeView();
        $layoutV = new \view\LayoutView();
        $registerM = new \model\RegisterModel();

        $registerV = new \view\RegisterView();
        $loginC = new LoginController($loginM);
        $registerC = new \controller\RegisterController($registerM, $registerV);
        $loggedInSuccessfully = false;*/

        //Dependency injection
        $m = new \model\LoginModel();
        $v = new \view\LoginView($m);
        $c = new \controller\LoginController($m, $v);
        $r_m = new \model\RegisterModel();
        $r_v = new \view\RegisterView();
        $r_c = new \controller\RegisterController($r_m, $r_v);


        $dtv = new \view\DateTimeView();
        $lv = new \view\LayoutView();

        //Controller must be run first since state is changed


        if($lv->didUserPressRegistrationLink())
        {
            $v = $r_v;
            $r_c->doRegister();

        }
        else
        {
            $v = new \view\LoginView($m);
            $c->doControl();
        }

        //Generate output

        $lv->render($m->isLoggedIn($v->getUserClient()), $v, $dtv);

        //$lv->render($loggedInSuccessfully, $lv, $dtv);


    }

}