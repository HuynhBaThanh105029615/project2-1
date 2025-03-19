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
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: apply.php");
        exit();
    }
    

    //Sanitize and validate input
    $job_ref = htmlspecialchars(trim($_POST['job_ref']));
    $first_name = htmlspecialchars(trim($_POST['first_name']));
    $last_name = htmlspecialchars(trim($_POST['last_name']));
    $dob = htmlspecialchars(trim($_POST['dob']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $street = htmlspecialchars(trim($_POST['street']));
    $suburb = htmlspecialchars(trim($_POST['suburb']));
    $urstate = htmlspecialchars(trim($_POST['state']));
    $postcode = htmlspecialchars(trim($_POST['postcode']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $skills = isset($_POST['skills']) ? implode(", ", $_POST['skills']) : ""; // Convert array to string
    $other_skills = htmlspecialchars(trim($_POST['other_skills']));
    $status = "New";

    //age calculation
    $dob_date = new DateTime($dob);
    $current_date = new DateTime();
    $age = $dob_date -> diff($current_date) -> y;


    // Server-side validation
    $errors = [];
    if (!preg_match("/^[a-zA-Z0-9]{5}$/", $job_ref)) $errors[] = "Invalid Job Reference Number.";
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $first_name)) $errors[] = "Invalid First Name.";
    if (!preg_match("/^[a-zA-Z]{1,20}$/", $last_name)) $errors[] = "Invalid Last Name.";
    if ($age < 15 || $age > 80) $errors[] = "Age must be between 15 and 80.";
    if (!in_array($urstate, ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"])) $errors[] = "Invalid State.";
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
    $query = "INSERT INTO $sql_table (job_ref_num, first_name, last_name, street, suburb, urstate, postcode, email, phone, skills, other_skills, status) VALUES ('$job_ref', '$first_name', '$last_name', '$street',
    '$suburb', '$urstate', '$postcode', '$email', '$phone', '$skills', '$other_skills', '$status')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "<p class=\"wrong\">Something in wrong with ", $query, "</p>";
    }   else {
        echo "<p class=\"ok\">Successfully added New member information</p>";
    }

    mysqli_close($conn);

?>
</body>