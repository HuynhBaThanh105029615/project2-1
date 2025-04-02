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
session_start();
require_once "settings.php"; // Ensure settings.php has correct database credentials

// Connect to the database
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Get user input
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Validate inputs
if (empty($username) || empty($password)) {
    die("<p style='color: red;'>Please fill in all fields!</p>");
}

// Prepare SQL query
$query = "SELECT * FROM manage WHERE username = ?";

$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("Query preparation failed: " . mysqli_error($conn)); // Debugging message
}

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (!$result) {
    die("Query execution failed: " . mysqli_error($conn)); // Debugging message
}

if ($row = mysqli_fetch_assoc($result)) {
    // Check password (Plain text comparison - not recommended)
    if ($password === $row['password']) {
        $_SESSION['username'] = $row['username'];
        header("Location: manage.php");
        exit();
    } else {
        echo "<p style='color: red;'>Invalid password!</p>";
    }
} else {
    echo "<p style='color: red;'>Username not found!</p>";
}

// Cleanup
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

</body>
</html>

