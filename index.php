<?php


require_once('helpers/config.php');
require_once('controller/AppController.php');
require_once("model/User.php");
require_once("model/LoginDAL.php");


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');

//Start a session
session_start();
//session_regenerate_id();

$app = new \controller\AppController();

$app->run();

