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
    if (isset($_POST['manageaccount'])) {
        $username = @htmlspecialchars(trim($_POST['username']));
        $password = @htmlspecialchars(trim($_POST['password']));
    
        if ($username == "bathanh" && $password == "140805") {
            header('Location: manage.php');
        }
        else {
            echo "Invalid login, try again";
        }
    }
?>

</body>
</html>

