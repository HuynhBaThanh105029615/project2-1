<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc';
?>

<body class="manage-body">
    <?php 
        include 'menu.inc';
    ?>
    <div class="search_eoi_info">
        <form method="POST" action="manage.php" id="search_eoi_info_form">
            <label for="job_ref">Job reference number:</label>
            <input type="text" name="job_ref">
    
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name">

            <input type="submit" name="search_eoi" value="Search" id="searchbutton">
        </form>
        <form method="POST" action="managing.php" id="delete_form"> 
            <label for="delete_job_ref">Job Reference Number:</label>
            <input type="text" name="delete_job_ref" required>
            <input type="submit" name="delete_eoi" value="Delete EOIs">
        </form>
        <form method="POST" action="managing.php" id="status_form">
            <label for="eoi_number">EOI Number:</label>
            <input type="number" name="eoi_number" required>

            <label for="new_status">Select New Status:</label>
            <select name="new_status" required>
                <option value="1">New</opt>
                <option value="2">Current</option>
                <option value="3">Final</option>
            </select>

            <input type="submit" name="update_status" value="Update Status">
        </form>
    </div>
    <div>
    <?php
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
        if (!$conn) {
            die("<p>Database connection failed.</p>");
        }
        $query = "SELECT * FROM eoi";
        $params = [];
        $types = "";
        
        // Check if search form is submitted
        if (isset($_POST['search_eoi'])) {
            $job_ref = @htmlspecialchars(trim($_POST['job_ref']));
            $first_name = @htmlspecialchars(trim($_POST['first_name']));
            $last_name = @htmlspecialchars(trim($_POST['last_name']));

            // Modify query if search fields are filled
            if (!empty($job_ref) || !empty($first_name) || !empty($last_name)) {
                $query = "SELECT * FROM eoi WHERE 1=1";

            if (!empty($job_ref)) {
                $query .= " AND job_ref_num = ?";
                $params[] = $job_ref;
                $types .= "s";
            }

            if (!empty($first_name)) {
                $query .= " AND first_name = ?";
                $params[] = $first_name;
                $types .= "s";
            }

            if (!empty($last_name)) {
                $query .= " AND last_name = ?";
                $params[] = $last_name;
                $types .= "s";
            }
        }
    }
    
        // Prepare and execute query
        $stmt = mysqli_prepare($conn, $query);
        if (!empty($params)) {
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    ?>
        
    <table class="members_info_table">
    <tr>
        <th>EOI Number</th>
        <th>Job Reference Number</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>DOB</th>
        <th>Gender</th>
        <th>Street</th>
        <th>Suburb/Town</th>
        <th>State</th>
        <th>Postcode</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Skills</th>
        <th>Other Skills</th>
        <th>Status</th>
    </tr>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['EOInumber']}</td>
                    <td>{$row['job_ref_num']}</td>
                    <td>{$row['first_name']}</td>
                    <td>{$row['last_name']}</td>
                    <td>{$row['dob']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['street']}</td>
                    <td>{$row['suburb']}</td>
                    <td>{$row['urstate']}</td>
                    <td>{$row['postcode']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['skills']}</td>
                    <td>{$row['other_skills']}</td>
                    <td>{$row['status']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='15'>No records found.</td></tr>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>
    </table>

    </div>
    <?php   
        include 'footer.inc';
    ?>
</body>
</html>