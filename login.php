<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.inc';
?>
<body class="login-body">
    <?php
        include 'menu.inc';
    ?>
    <div class="login-form">
        <form method="POST" action="login_process.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <div class="login-function-button">
                <input type="submit" value="Login" name="login" id="submitbutton">
                <input type="button" value="Register" id="registerbutton" onclick="window.location.href='register.php';">
            </div>
        </form>
    </div>
    <?php
        include 'footer.inc';
    ?>
</body>
</html>
