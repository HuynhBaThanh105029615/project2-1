<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.inc';
?>
<body class="manage-login-body">
    <?php
        include 'menu.inc';
    ?>
    <div class="manage-login-form">
        <form method="POST" action="manage_login_process.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>
            <div class="login-function-button">
                <input type="submit" value="Login" name="manageaccount" id="submitbutton">
                <p><a href="register.php" id="registerbutton">Register</a></p>
            </div>
        </form>
    </div>
    <?php
        include 'footer.inc';
    ?>
</body>
</html>
