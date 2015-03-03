<?php

//displays logout, login buttons
if (isset($_SESSION['username'])) {
    echo '<p><a href="logout.php">Logout</a></p>';
} else {
    echo '<p><a href="login.php">Login</a></p>';
}
