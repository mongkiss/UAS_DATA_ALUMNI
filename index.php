<?php

require_once "config/Session.php";

Session::start();

if(isset($_SESSION['login']))
{
    header("Location: view/dashboard.php");
    exit;
}
else
{
    header("Location: view/login.php");
    exit;
}

?>