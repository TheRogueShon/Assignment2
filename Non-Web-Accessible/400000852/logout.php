<?php 
include 'autoload.php';

Session::create();
$session = new Session();
$session->destroy();
header('Location:index.php');