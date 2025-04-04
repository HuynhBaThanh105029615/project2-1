<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc';
?>

<body class="manage-body">
    <?php 
        include 'menu.inc';
    ?>
    <?php
        session_start();
        if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== "manager") {
            header("Location: index.php"); // Redirect unauthorized users
            exit();
        }
    ?>
    <div class="search_eoi_info">
        <form method="POST" action="manage.php" id="search_eoi_info_form">
            <h2>Seacrh EOI</h2>
            <label for="job_ref">Job reference number:</label>
            <input type="text" name="job_ref">
    
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name">

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name">

            <input type="submit" name="search_eoi" value="Search" id="searchbutton">
        </form>
        <form method="POST" action="managing.php" id="delete_form"> 
            <h2>Delete EOI</h2>
            <label for="delete_job_ref">Job Reference Number:</label>
            <input type="text" name="delete_job_ref" required>
            <input type="submit" name="delete_eoi" value="Delete EOIs" id="deletebutton">
        </form>
        <form method="POST" action="managing.php" id="status_form">
            <h2>Change Status</h2>
            <label for="eoi_number">EOI Number:</label>
            <input type="number" name="eoi_number" required>

            <label for="new_status">Select New Status:</label>
            <select name="new_status" required>
                <option value="1">New</opt>
                <option value="2">Current</option>
                <option value="3">Final</option>
            </select>

            <input type="submit" name="update_status" value="Update Status" id="updatebutton">
        </form>
    </div>
    <div>
    <?php

        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            die("<p>Database connection failed.</p>");
        }
        // Set default sorting column and order
        $sortColumn = "EOInumber"; // Default column
        $sortOrder = "ASC"; // Default order

        // Check if sorting parameters are provided
        if (isset($_GET['sort']) && in_array($_GET['sort'], ['EOInumber', 'job_ref_num', 'first_name', 'last_name', 'dob', 'gender', 'street', 'suburb', 'urstate', 'postcode', 'email', 'phone', 'skills', 'other_skills', 'status'])) {
            $sortColumn = $_GET['sort'];
        }

        if (isset($_GET['order']) && ($_GET['order'] === "ASC" || $_GET['order'] === "DESC")) {
            $sortOrder = $_GET['order'];
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
    
        // Append sorting
        $query .= " ORDER BY $sortColumn $sortOrder";
        // Prepare and execute query
        $stmt = mysqli_prepare($conn, $query);
        if (!empty($params)) {
            $bindParams = [$stmt, $types];
        
            // Convert each element in $params to a reference
            foreach ($params as $key => $value) {
                $bindParams[] = &$params[$key];
            }
        
            call_user_func_array('mysqli_stmt_bind_param', $bindParams);
        }
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        // Function to toggle sorting order
        function toggleSort($column) {
            $currentOrder = (isset($_GET['order']) && $_GET['order'] === "ASC") ? "DESC" : "ASC";
            $sortParam = isset($_GET['sort']) ? $_GET['sort'] : "";
            return ($column === $sortParam) ? $currentOrder : "ASC";
        }
    ?> 
    <table class="members_info_table">
    <tr>
        <th><a href="?sort=EOInumber&order=<?php echo toggleSort('EOInumber'); ?>">EOI Number</a></th>
        <th><a href="?sort=job_ref_num&order=<?php echo toggleSort('job_ref_num'); ?>">Job Reference Number</a></th>
        <th><a href="?sort=first_name&order=<?php echo toggleSort('first_name'); ?>">First Name</a></th>
        <th><a href="?sort=last_name&order=<?php echo toggleSort('last_name'); ?>">Last Name</a></th>
        <th><a href="?sort=dob&order=<?php echo toggleSort('dob'); ?>">DOB</a></th>
        <th><a href="?sort=gender&order=<?php echo toggleSort('gender'); ?>">Gender</a></th>
        <th><a href="?sort=street&order=<?php echo toggleSort('street'); ?>">Street</a></th>
        <th><a href="?sort=suburb&order=<?php echo toggleSort('suburb'); ?>">Suburb/Town</a></th>
        <th><a href="?sort=urstate&order=<?php echo toggleSort('urstate'); ?>">State</a></th>
        <th><a href="?sort=postcode&order=<?php echo toggleSort('postcode'); ?>">Postcode</a></th>
        <th><a href="?sort=email&order=<?php echo toggleSort('email'); ?>">Email</a></th>
        <th><a href="?sort=phone&order=<?php echo toggleSort('phone'); ?>">Phone</a></th>
        <th><a href="?sort=skills&order=<?php echo toggleSort('skills'); ?>">Skills</a></th>
        <th><a href="?sort=other_skills&order=<?php echo toggleSort('other_skills'); ?>">Other Skills</a></th>
        <th><a href="?sort=status&order=<?php echo toggleSort('status'); ?>">Status</a></th>
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