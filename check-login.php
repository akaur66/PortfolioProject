<?php
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

//see if the user is logged in

//start session
session_start();

//if not logged in
if(!isset($_SESSION['un'])){
    //redirect them to the login page
    header("location: login.php");
}
