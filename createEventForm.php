<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<!--layout of the form the user will enter to fill out and create a new event-->
<html>
    <head>
        <meta charset="UTF-8">
        <link type = "text/css" href ="Event.css" rel ="stylesheet"/>
        <title></title>
        <script type="text/javascript" src="js/event.js"></script>
        <!--calls the javascript which validates form-->
        <script type="text/javascript" src="js/createEvent.js"></script>
    </head>
    <body>
        <img src="logo_event.png" alt="logo" style="width:500px;height:200px;">
        <?php require 'toolbar.php' ?>
        <h1>Create Event Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <!--Details needed to run page properly and add function to perfrom an action when submit is pressed-->
        <form id="createEventForm" name="createEventForm" action="createEvent.php" method="POST"
              onsubmit="return validateCreateEvent(this);">
            <table border="0">
                <tbody>
                    <tr>
                        <!--Begins first row of form-->
                        <td>Title</td>
                        <td>
                            <!--linked with js to give error if empty-->
                            <input type="text" name="Title" value="" />
                            <span id="titleError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="Description" value="" />
                            <span id="descriptionError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>
                            <input type="text" name="StartDate" value="" />
                            <span id="startDateError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>
                            <input type="text" name="Time" value="" />
                            <span id="timeError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>
                            <input type="text" name="EndDate" value="" />
                            <span id="endDateError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Max Capacity</td>
                        <td>
                            <input type="text" name="MaxCapacity" value="" />
                            <span id="maxCapacityError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            <input type="text" name="Price" value="" />
                            <span id="priceError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Location</td>
                        <td>
                            <select name ="Locationid">
                                <option value ="-1">No Location</option>
                                <?php
                                $l = $locations->fetch(PDO::FETCH_ASSOC);
                                while ($l) {
                                    echo '<option value="' . $l['lid'] . '">' . $l['name'] . '</option>';
                                    $l = $locations->fetch(PDO::FETCH_ASSOC);
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Event" name="createEvent" />
                            <a href="home.php">Back to Home</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
