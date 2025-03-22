<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc';
?>

<body class="jobs2-body">
    <?php 
        include 'menu.inc';
    ?>
    <?php
        require_once "settings.php";
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db); 

        if ($conn) { 
            $query = "SELECT * FROM jobs"; 
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
    <div class="jobsinfo">
    <table border="1" style="color: black; margin: 7%; background-color: #EFE3C2; text-align: center; border-radius: 20px; padding: 1em;" >
        <caption style="color: black; font-size: 2em;">Jobs List</caption>
        <?php
            echo "<tr>";
            echo "<th>ID</th> <th>Title</th> <th>Job Reference Number</th> <th>Salary</th> <th>Level</th> <th>Type</th> <th>Location</th> <th>Description</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row["id"] ."</td>";
                echo "<td>". $row["title"] ."</td>";
                echo "<td>". $row["job_ref_num"] ."</td>";    
                echo "<td>". $row["salary"] ."</td>";
                echo "<td>". $row["level"] ."</td>";
                echo "<td>". $row["type"] ."</td>";
                echo "<td>". $row["location"] ."</td>";
                echo "<td>". $row["description"] ."</td>";
                echo "</tr>";
            }
        ?>
    </table>
    </div>
    <?php 
        include 'footer.inc';
    ?>
</body>
