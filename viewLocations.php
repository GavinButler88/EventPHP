<?php
require_once 'Connection.php';
require_once 'LocationTableGateway.php';
require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$locationGateway = new LocationTableGateway($connection);
$locations = $locationGateway->getLocation();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/event.js"></script>
        <?php require "styles.php" ?>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
        <div class="container">
            <h2>View Locations</h2>
            <?php
            if (isset($message)) {
                echo '<p>'.$message.'</p>';
            }
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name of Location</th>
                        <th>Address</th>
                        <th>Max Capacity</th>
                        <th>Location Manager Name</th>
                        <th>Location Manager Address</th>
                        <th>Location Manager Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $row = $locations->fetch(PDO::FETCH_ASSOC);
                    while ($row) {
                        echo '<td>' . $row['nameOfLocation'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['maxCapacity'] . '</td>';
                        echo '<td>' . $row['LocationManagerName'] . '</td>';
                        echo '<td>' . $row['LocationManagerAddress'] . '</td>';
                        echo '<td>' . $row['LocationManagerNumber'] . '</td>';
                        echo '<td>'
                        . '<a href="viewLocation.php?id='.$row['id'].'">View</a> '
                        . '<a href="editLocationForm.php?id='.$row['id'].'">Edit</a> '
                        . '<a class="deleteLocation" href="deleteLocation.php?id='.$row['id'].'">Delete</a> '
                        . '</td>';
                        echo '</tr>';
                        $row = $locations->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                </tbody>
            </table>
            <p><a href="createLocationForm.php">Create Location</a></p>
        </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
    </body>
</html>
