<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "settings.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        die("Database connection failed.");
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare($conn, "SELECT id, password, role FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if ($password === $row['password']) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["role"] = $row["role"];

            // Redirect based on role
            if ($row["role"] === "manager") {
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Invalid credentials.";
        }
    } else {
        echo "User not found.";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
</html>