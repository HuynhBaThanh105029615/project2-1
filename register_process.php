<!DOCTYPE html>
<html lang="en">
<head>
<title>Register</title>

<meta charset="utf-8" />
<meta name="description" content="project2"  />
<meta name="keywords" content="register" />

</head>
<body>
<?php
    
    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
    
    //prevent direct access by url
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: apply.php");
        exit();
    }
    

    //Sanitize and validate input
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Server-side validation
    $errors = [];
    if (!preg_match("/^[a-zA-Z0-9 ]{1,50}$/", $username)) $errors[] = "Invalid Username.";
    if (!preg_match("/^[a-zA-Z0-9 ]{1,50}$/", $password)) $errors[] = "Invalid Password.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit();
    }

    //adding process

    $sql_table = "users";
    $query = "INSERT INTO $sql_table (id, username, password,role) VALUES (NULL, '$username','$password',1)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p class=\"wrong\">Something in wrong with ", $query, "</p>";
    }   else {
        echo "<p class=\"ok\">Successfully added new account</p>";
        echo "<p>You can back to the login <a href='login.php'>here</a></p>";
    }
    mysqli_close($conn);

?>
</body>