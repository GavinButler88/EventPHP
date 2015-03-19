<?php
require_once 'Event.php';
require_once 'Connection.php';
require_once 'EventTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die("invalid request");
}

$id = $_GET['id'];

$connection = Connection:: getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type = "text/css" href ="event.css" rel ="stylesheet"/>
        <script type = "text/javascript" src="js/event.js"></script>
        <title></title>
    </head>
    <body>
        <img src="logo_event.png" alt="logo" style="width:500px;height:200px;">
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        
        <?php 
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                //displays layout and details of the database event
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                echo '<tr>';
                echo '<td>Title</td>'
                . '<td>' . $row['Title'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Description</td>'
                . '<td>' . $row['Description'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Start Date</td>'
                . '<td>' . $row['StartDate'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Time</td>'
                . '<td>' . $row['Time'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>End Date</td>'
                . '<td>' . $row['EndDate'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Max Capacity</td>'
                . '<td>' . $row['MaxCapacity'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Price</td>'
                . '<td>' . $row['Price'] . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td>Location</td>'
                . '<td>' . $row['Locationid'] . '</td>';
                ?>
            </tbody>
        </table>
        <p>
            <!--displays button and takes user back to home page when finished-->
            <a href="home.php">Back to Home</a>
        </p>
    </body>
</html>


