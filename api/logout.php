<?php

//登出
include_once "function.php";

session_start();
unset($_SESSION['user']);
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['lv']);

to("../index.php");

?>