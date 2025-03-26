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
<form method="POST" action="manage_login.php">
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>

    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    
    <input type="submit" value="Login" name="manageaccount" id="submitbutton">
</form>
</div>
<?php
    if (isset($_POST['manageaccount'])) {
        $username = @htmlspecialchars(trim($_POST['username']));
        $password = @htmlspecialchars(trim($_POST['password']));
    
        if ($username == "bathanh" && $password == "140805") {
            header('Location: manage.php');
        }
        else {
            echo "Invalid login. <a href='login.php'>Try again</a>";
        }
    }
?>
<?php
    include 'footer.inc';
?>
</body>
</html>
