<?php
    if (isset($_POST['delete_eoi'])) {
        $delete_job_ref = @htmlspecialchars(trim($_POST['delete_job_ref']));
        
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if ($conn) {
            // Prepare the DELETE query
             $delete_query = "DELETE FROM eoi WHERE job_ref_num = ?";
                
            // Use Prepared Statement for security
            $stmt = mysqli_prepare($conn, $delete_query);
            mysqli_stmt_bind_param($stmt, "s", $delete_job_ref);
            mysqli_stmt_execute($stmt);
        
            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("location: manage.php");
            } else {
                echo "<p style='color: red;'>No EOIs found with Job Reference Number: $delete_job_ref.<br>
                <a href='manage.php'>Back to Manage page</a></p>";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "<p>Database connection failed.</p>";
        }
    }
?>
<?php
    if (isset($_POST['update_status'])) {
        $eoi_number = @htmlspecialchars(trim($_POST['eoi_number']));
        $new_status = @htmlspecialchars(trim($_POST['new_status']));
        
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if ($conn) {
            // Prepare the UPDATE query
            $update_query = "UPDATE eoi SET status = ? WHERE EOInumber = ?";
                
            // Use Prepared Statement
            $stmt = mysqli_prepare($conn, $update_query);
            mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_number);
            mysqli_stmt_execute($stmt);
        
            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                header("location: manage.php");
            } else {
                echo "<p style='color: red;'>Failed to update. EOI number $eoi_number may not exist.
                <a href='manage.php'>Back to Manage page</a></p>";
            }
        
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } else {
            echo "<p>Database connection failed.</p>";
        }
    }
?>
