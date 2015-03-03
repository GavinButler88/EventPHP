<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type = "text/css" href ="Event.css" rel ="stylesheet"/>
        <title>Application Title</title>
        <!--calls js functions-->
        <script type="text/javascript" src="js/createEvent.js"></script>
        <script type="text/javascript" src="js/register.js"></script>
    </head>
    <body>
    <center>
        <?php
        //checks to see if input field in empty
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <form action="checkLogin.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <!--displays text-->
                        <td>Username</td>
                        <td>
                            <!--checks input type and values-->
                            <input type="text"
                                   name="username"
                                   value="<?php echo $username; ?>" />
                            <span id="usernameError" class="error">
                                <?php
                                //checks for erros
                                if (isset($errorMessage) && isset($errorMessage['username'])) {
                                    echo $errorMessage['username'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" value="" />
                            <span id="passwordError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['password'])) {
                                    echo $errorMessage['password'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <!--outputs buttons and gets them to perform actions-->
                            <input type="submit" value="Login" name="login" />
                            <input type="button"
                                   value="Register"
                                   name="register"
                                   onclick="document.location.href = 'register.php'"
                                   />
                            <input type="button" value="Forgot Password" name="forgot" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </center>
</body>
</html>
