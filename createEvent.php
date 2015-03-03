<?php

require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);
//Gets the tables of the database 
$title = $_POST['Title'];
//DIDNT PUT INTO SANITIZER AS IM NOT SURE TIME/DAY SQL DATA TYPES ARE
//So I put them in comments to show I know how to do them
//$maxCapacity = filter_input(INPUT_POST, 'maxCapacity', FILTER_SANITIZE_INT);
//$maxCapacityValid = filter_var($maxCapacity, FILTER_VALIDATE_INT);

$description = $_POST['Description'];
$startDate = $_POST['StartDate'];
$time = $_POST['Time'];
$endDate = $_POST['EndDate'];
$maxCapacity = $_POST['MaxCapacity'];
$price = $_POST['Price'];
$locationid = $_POST['LocationId'];
if ($locationid == -1) {
    $locationid = NULL;
}
//the new values are put into these
$id = $gateway->insertEvent($title, $description, $startDate, $time, $endDate, $maxCapacity, $price, $locationid);

header('Location: viewEvents.php');
