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
    <div class="search_mem_info">
        <h2>Search for eoi by job reference number</h2>
        <form method="POST" action="manage.php">
            <label for="search_eoi_by_job_ref">Please enter a job reference number here:</label>
            <input type="text" name="search_eoi_by_job_ref"><br>
            <input type="submit" value="Search">
        </form>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $search_eoi_by_job_ref = htmlspecialchars(trim($_POST['search_eoi_by_job_ref']));
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
    <?php   
        include 'footer.inc';
    ?>
</body>