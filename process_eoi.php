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
    require_once "settings.php";
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db); 

    //prevent direct access by url
    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        header("Location: apply.php");
        exit();
    }
    
    //Sanitize and validate input
    $job_ref = trim($_POST['job_ref']);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $dob = trim($_POST['dob']);
    $gender = trim($_POST['gioitinh']);
    $street = trim($_POST['street']);
    $suburb = trim($_POST['suburb']);
    $state = trim($_POST['state']);
    $postcode = trim($_POST['postcode']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $skill = isset($_POST['kynang']) ? $_POST['kynang'] : [];
    $other_skill = trim($_POST['other_skill']);
    $status = "New";

    // Server-side validation
    $errors = [];
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_ref)) $errors[] = "Invalid Job Reference Number.";
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) $errors[] = "Invalid First Name.";
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) $errors[] = "Invalid Last Name.";
    if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) $errors[] = "Invalid Date of Birth.";
    if (!in_array($state, ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"])) $errors[] = "Invalid State.";
    if (!preg_match("/^\d{4}$/", $postcode)) $errors[] = "Invalid Postcode.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Invalid Email.";
    if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) $errors[] = "Invalid Phone Number.";
    if (empty($skills) && empty($other_skills)) $errors[] = "You must enter some skills.";

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit();
    }

    //adding process

    $sql_table = "eoi";
    $query = "INSERT INTO $sql_table (job_ref_num, first_name, last_name, street, suburb, urstate, postcode, email, phone, skill, other_skill, status) VALUES ('$job_ref', '$first_name', '$last_name', '$street',
    '$suburb', '$urstate', '$postcode', '$email', '$phone', '$skill', '$other_skill', '$street', '$status')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p class=\"wrong\">Something in wrong with ", $query, "</p>";
    }   else {
        echo "<p class=\"ok\">Successfully added New member information</p>";
    }

    mysqli_close($conn);

?>
</body>