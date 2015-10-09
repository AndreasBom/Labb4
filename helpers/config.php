<?php
/**
 * Created by PhpStorm.
 * User: Andreas
 * Date: 2015-09-09
 * Time: 19:44
 */

namespace helpers;


use model\LoginDAL;
use model\User;

class config
{
    //is used to get access to database

    const USERNAME = "admin";
    const PASSWORD = "1234";
    const SERVER = "localhost";
    const DATABASE = "loginapp";


    const DATASOURCE = "local"; // "local" or "remote"

}