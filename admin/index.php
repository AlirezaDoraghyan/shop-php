<?php
session_start();
$_SESSION['ali']="ali";
include_once "../database/database.php";
$var = database::check_login($_SESSION['ali']);
echo $_SESSION['ali'];