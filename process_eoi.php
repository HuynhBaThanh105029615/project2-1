<!DOCTYPE html>
<html lang="en">
<head>
<title>Process EOI</title>

<meta charset="utf-8" />
<meta name="description" content="project2"  />
<meta name="keywords" content="process eoi" />

</head>
<body>
<?php
    $jobnum = htmlspecialchars(trim($_POST["jobnum"]));
    $firstname = htmlspecialchars(trim($_POST["firstname"]));
    $lastname = htmlspecialchars(trim($_POST["lastname"]));
    $birth = htmlspecialchars(trim($_POST["birth"]));
    $gender = htmlspecialchars(trim($_POST["gioitinh"]));
    $street = htmlspecialchars(trim($_POST["street"]));
    $suburd = htmlspecialchars(trim($_POST["suburd"]));
    $state = htmlspecialchars(trim($_POST["state"]));
    $postcode = htmlspecialchars(trim($_POST["postcode"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $codeskill = htmlspecialchars(trim($_POST["kynang"]));
    $teamwork = htmlspecialchars(trim($_POST["teamwork"]));
    $otherskills = htmlspecialchars(trim($_POST["skills"]));
    

    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
    
    $sql_table = "eoi";
    $query = "INSERT INTO $sql_table (Job reference number, First name, Last name, Street address) VALUES ('$jobnum', '$firstname', '$lastname', '$street')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p class=\"wrong\">Something in wrong with ", $query, "</p>";
    }   else {
        echo "<p class=\"ok\">Successfully added New member information</p>";
    }

    mysqli_close($conn);

?>
</body>