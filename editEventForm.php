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
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new EventTableGateway($connection);

$statement = $gateway->getEventById($id);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type = "text/css" href ="Event.css" rel ="stylesheet"/>
        <title></title>
        <script type="text/javascript" src="js/event.js"></script>
        <!--calls the javascript which validates form-->
        <script type="text/javascript" src="js/editEvent.js"></script>
    </head>
    <body>
        <img src="logo_event.png" alt="logo" style="width:500px;height:200px;">
        <?php require 'toolbar.php' ?>
        <h1>Edit Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <!--layout of the form the user will enter to fill out and create a new event-->
        <form id="editEventForm" name="editEventForm" action="editEvent.php" method="POST"
              onsubmit="return validateEditEvent(this);">
            <input type="hidden" name="Eventid" value="<?php echo $id; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <!--Begins first row of form-->
                        <td>Title</td>
                        <td>
                            <!--puts original value in the text field-->
                            <input type="text" name="Title" value="<?php
                            if (isset($_POST) && isset($_POST['Title'])) {
                                echo $_POST['Title'];
                            } else
                                echo $row['Title'];
                            ?>" />
                            <!--linked with js to give error if empty-->
                            <span id="titleError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Title'])) {
                                    echo $errorMessage['Title'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="Description" value="<?php
                            if (isset($_POST) && isset($_POST['Description'])) {
                                echo $_POST['Description'];
                            } else
                                echo $row['Description'];
                            ?>" />
                            <span id="descriptionError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Description'])) {
                                    echo $errorMessage['Description'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>
                            <input type="text" name="StartDate" value="<?php
                            if (isset($_POST) && isset($_POST['StartDate'])) {
                                echo $_POST['StartDate'];
                            } else
                                echo $row['StartDate'];
                            ?>" />
                            <span id="startDateError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['StartDate'])) {
                                    echo $errorMessage['StartDate'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="Time" value="<?php
                            if (isset($_POST) && isset($_POST['Time'])) {
                                echo $_POST['Time'];
                            } else
                                echo $row['Time'];
                            ?>" />
                            <span id="timeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Time'])) {
                                    echo $errorMessage['Time'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>
                            <input type="text" name="EndDate" value="<?php
                            if (isset($_POST) && isset($_POST['EndDate'])) {
                                echo $_POST['EndDate'];
                            } else
                                echo $row['EndDate'];
                            ?>" />
                            <span id="endDateError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['EndDate'])) {
                                    echo $errorMessage['EndDate'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Max Capacity</td>
                        <td>
                            <input type="text" name="MaxCapacity" value="<?php
                            if (isset($_POST) && isset($_POST['MaxCapacity'])) {
                                echo $_POST['MaxCapacity'];
                            } else
                                echo $row['MaxCapacity'];
                            ?>" />
                            <span id="maxCapacityError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['MaxCapacity'])) {
                                    echo $errorMessage['MaxCapacity'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="Price" value="<?php
                            if (isset($_POST) && isset($_POST['Price'])) {
                                echo $_POST['Price'];
                            } else
                                echo $row['Price'];
                            ?>" />
                            <span id="priceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['Price'])) {
                                    echo $errorMessage['Price'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Edit Event" name="editEvent" />
                            <a href="home.php">Back to Home</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>

