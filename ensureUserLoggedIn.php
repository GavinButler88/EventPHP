<?php

$id = session_id();
if ($id == "") {
    session_start();
}
//checks to see if someone is logged in
if (!isset($_SESSION['username'])) {
    header("Location:login.php");
}