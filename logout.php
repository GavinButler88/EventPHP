<?php

$id = session_id();
if ($id == "") {
    session_start();
}
//if there is no username then end the session and take the user to the index
$_SESSION['username'] = NULL;
unset($_SESSION['username']);
//takes user to page outside home
header("Location: login.php");
