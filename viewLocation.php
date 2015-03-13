<?php
require_once 'Connection.php';
require_once 'LocatoinTableGateway.php';
require_once 'EventTableGateway.php';
$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}
require 'ensureUserLoggedIn.php';
if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];
$connection = Connection::getInstance();
$LocationGateway = new LocationTableGateway($connection);
$EventGateway = new EventTableGateway($connection);
$locations = $locationGateway->getLocationById($id);
$events = $eventGateway->getEventByLocationId($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/location.js"></script>
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Location Details</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <tbody>
                    <?php
                    $location = $locations->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name Of Location</td>'
                    . '<td>' . $location['nameOfLocation'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Address</td>'
                    . '<td>' . $location['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Max Capacity</td>'
                    . '<td>' . $location['maxCapacity'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location Manager Name</td>'
                    . '<td>' . $location['locationManagerName'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location Manager Address</td>'
                    . '<td>' . $location['locationManagerAddress'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Location Manager Number</td>'
                    . '<td>' . $location['locationManagerNumber'] . '</td>';
                    echo '</tr>';
                    ?>
                </tbody>
            </table>
            <p>
                <a href="editLocationForm.php?id=<?php echo location['id']; ?>">
                    Edit Location</a>
                <a class="deleteLocation" href="deleteLocation.php?id=<?php echo location['id']; ?>">
                    Delete Location</a>
            </p>
            <h3>Event Assigned to <?php echo location['nameOfLocation']; ?></h3>
            <?php if ($events->rowCount() !== 0) { ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>Time</th>
                            <th>End Date</th>
                            <th>Max Capacity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = $events->fetch(PDO::FETCH_ASSOC);
                        while ($row) {
                            echo '<tr>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>' . $row['startDate'] . '</td>';
                            echo '<td>' . $row['time'] . '</td>';
                            echo '<td>' . $row['endDate'] . '</td>';
                            echo '<td>' . $row['maxCapacity'] . '</td>';
                            echo '<td>' . $row['price'] . '</td>';
                            echo '<td>'
                            . '<a href="viewEvent.php?id='.$row['id'].'">View</a> '
                            . '<a href="editEventForm.php?id='.$row['id'].'">Edit</a> '
                            . '<a class="deleteEvent" href="deleteEvent.php?id='.$row['id'].'">Delete</a> '
                            . '</td>';
                            echo '</tr>';
                            $row = $events->fetch(PDO::FETCH_ASSOC);
                        }
                        ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>There are no events assigned to this location.</p>
            <?php } ?>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>

