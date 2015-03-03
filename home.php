<?php
require_once 'Event.php';
require_once 'connection.php';
require_once 'EventTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEvents();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!--calls css file-->
        <link type = "text/css" href ="Event.css" rel ="stylesheet"/>
        <title></title>
    </head>
    <body>
        <!--inserts image onto top of page-->
        <img src="logo_event.png" alt="logo" style="width:500px;height:200px;">
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <!--table layout of home page-->
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>Time</th>
                    <th>End Date</th>
                    <th>Maximum Capacity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {

                    //gets details from database and displays them
                    echo '<td>' . $row['Title'] . '</td>';
                    echo '<td>' . $row['Description'] . '</td>';
                    echo '<td>' . $row['StartDate'] . '</td>';
                    echo '<td>' . $row['Time'] . '</td>';
                    echo '<td>' . $row['EndDate'] . '</td>';
                    echo '<td>' . $row['MaxCapacity'] . '</td>';
                    echo '<td>' . $row['Price'] . '</td>';
                    echo '<td>'
                    //displays buttons and links
                    . '<a href="viewEvent.php?id=' . $row['Eventid'] . '">View</a> '
                    . '<a href="editEventForm.php?id=' . $row['Eventid'] . '">Edit</a> '
                    . '<a class="deleteEvent" href="deleteEvent.php?id=' . $row['Eventid'] . '">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>

        <p>
            <a href="createEventForm.php">Create Event</a>
            <a href="home.php">Back to Home</a>
        </p>
    </body>
</html>
