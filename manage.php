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
        <br> <br> <br> <br> <br> <br>
    <table border="1">
        <caption>Members information</caption>
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
    <?php   
        include 'footer.inc';
    ?>
</body>