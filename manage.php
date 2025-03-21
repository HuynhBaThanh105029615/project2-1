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
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db); 

        if ($conn) { 
            $query = "SELECT * FROM eoi"; 
            $result = mysqli_query($conn, $query); 

        if ($result) { 
        
        } else {
            echo "<p>There is no information to display</p>";
        }

        mysqli_close($conn); 
        } else {
        echo "<p>Unable to connect to the db.</p>"; 
        }
    ?>
    <div class="phpmeminfo">
    <table border="1" style="color: black; margin: 7%; background-color: #EFE3C2; text-align: center; border-radius: 20px; padding: 1em;" >
        <caption style="color: black; font-size: 2em;">Members information</caption>
        <?php
            echo "<tr>";
            echo "<th>EOI Number</th> <th>Job Reference Number</th> <th>First Name</th> <th>Last Name</th> <th>DOB</th> <th>Gender</th> <th>Street Address</th> <th>Suburb/town</th> <th>State</th> <th>Postcode</th> <th>Email</th> <th>Phone</th> <th>Skills</th> <th>Other skills</th> <th>Status</th>" ;
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["EOInumber"] ."</td>";
                echo "<td>". $row["job_ref_num"] ."</td>";
                echo "<td>". $row["first_name"] ."</td>";    
                echo "<td>". $row["last_name"] ."</td>";
                echo "<td>". $row["dob"] ."</td>";
                echo "<td>". $row["gender"] ."</td>";
                echo "<td>". $row["street"] ."</td>";
                echo "<td>". $row["suburb"] ."</td>";    
                echo "<td>". $row["urstate"] ."</td>";
                echo "<td>". $row["postcode"] ."</td>";
                echo "<td>". $row["email"] ."</td>";
                echo "<td>". $row["phone"] ."</td>";
                echo "<td>". $row["skills"] ."</td>";    
                echo "<td>". $row["other_skills"] ."</td>";
                echo "<td>". $row["status"] ."</td>";
                echo "</tr>";
            }
        ?>
    </table> 
    </div>
    <div class="search_eoi_by_job_ref">
        <h2>Search for eoi by job reference number</h2>
        <form method="POST" action="manage.php">
            <label for="search_eoi_by_job_ref">Please enter a job reference number here:</label>
            <input type="text" name="search_eoi_by_job_ref"><br>
            <input type="submit" value="Search">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_eoi_by_job_ref = @htmlspecialchars(trim($_POST['search_eoi_by_job_ref']));
                require_once "settings.php";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                
                if ($conn) { 
                    $query = "SELECT * FROM eoi WHERE job_ref_num = '$search_eoi_by_job_ref'";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result && mysqli_num_rows($result) > 0) { 
                        echo "<table border='1'>
                                <tr>
                                    <th>EOI Number</th>
                                    <th>Job Ref Num</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Street</th>
                                    <th>Suburb</th>
                                    <th>State</th>
                                    <th>Postcode</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Skills</th>
                                    <th>Other Skills</th>
                                    <th>Status</th>
                                </tr>";
                        
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
                        
                        echo "</table>";
                        mysqli_free_result($result);
                    } else {
                        echo "<p>There is no information to display.</p>";
                    }
                    mysqli_close($conn);
                } else {
                    echo "<p>Database connection failed.</p>";
                }
            }
        ?>
    </div>
    <div class="search_eoi_by_name">
    <h2>Search for EOIs by Applicant Name</h2>
    <form method="POST" action="manage.php">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name"><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name"><br><br>

        <input type="submit" name="search_name" value="Search">
    </form>
    <?php
        if (isset($_POST['search_name'])) {
            $first_name = @htmlspecialchars(trim($_POST['first_name']));
            $last_name = @htmlspecialchars(trim($_POST['last_name']));
        
            require_once "settings.php";
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        
            if ($conn) {
                $query = "SELECT * FROM eoi WHERE 1=1";
                
                if (!empty($first_name)) {
                    $query .= " AND first_name LIKE '$first_name'";
                }
                if (!empty($last_name)) {
                    $query .= " AND last_name LIKE '$last_name'";
                }
        
                $result = mysqli_query($conn, $query);
        
                if ($result && mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>
                            <tr>
                                <th>EOI Number</th>
                                <th>Job Ref Num</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Gender</th>
                                <th>Street</th>
                                <th>Suburb</th>
                                <th>State</th>
                                <th>Postcode</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Skills</th>
                                <th>Other Skills</th>
                                <th>Status</th>
                            </tr>";
                    
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
                    echo "</table>";
                    mysqli_free_result($result);
                } else {
                    echo "<p>No matching EOIs found.</p>";
                }
                mysqli_close($conn);
            } else {
                echo "<p>Database connection failed.</p>";
            }
        }
    ?>
    <div class="delete_eoi_by_job_ref">
    <h2>Delete EOIs by Job Reference Number</h2>
    <form method="POST" action="manage.php">
        <label for="delete_job_ref">Enter Job Reference Number to Delete EOIs:</label>
        <input type="text" name="delete_job_ref" required><br><br>
        <input type="submit" name="delete_eoi" value="Delete EOIs">
    </form>
    </div>
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
                    echo "<p style='color: green;'>Successfully deleted all EOIs with Job Reference Number: $delete_job_ref</p>";
                } else {
                    echo "<p style='color: red;'>No EOIs found with Job Reference Number: $delete_job_ref</p>";
                }
        
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } else {
                echo "<p>Database connection failed.</p>";
            }
        }
    ?>
    <div class="update_status_info">
    <h2>Update EOI Status</h2>
    <form method="POST" action="manage.php">
        <label for="eoi_number">Enter EOI Number:</label>
        <input type="number" name="eoi_number" required><br><br>

        <label for="new_status">Select New Status:</label>
        <select name="new_status" required>
            <option value="1">New</option>
            <option value="2">Current</option>
            <option value="3">Final</option>
        </select><br><br>

        <input type="submit" name="update_status" value="Update Status">
    </form>
    </div>
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
                    echo "<p style='color: green;'>EOI number $eoi_number successfully updated to status: $new_status</p>";
                } else {
                    echo "<p style='color: red;'>Failed to update. EOI number $eoi_number may not exist.</p>";
                }
        
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
            } else {
                echo "<p>Database connection failed.</p>";
            }
        }
    ?>
</div>
    <?php   
        include 'footer.inc';
    ?>
</body>