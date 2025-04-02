<!DOCTYPE html>
<html lang="en">
<?php 
    include 'header.inc';
?>
<body class="register-body">
    <?php
        include 'menu.inc';
    ?>
    <div class="registerform">
        <form method="POST" action="register_process.php">
            <Label for="fullname">Please enter your full name:</Label>
            <input type="text" name="fullname" required>
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="text" name="password" required>
            <input type="submit" value="Register" name="createaccount" id="createaccountbutton">
        </form>
    </div>
    <?php
        include 'footer.inc';
    ?>