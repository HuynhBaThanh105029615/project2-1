<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc';
?>

<body class="jobs-body">
    <?php 
        include 'menu.inc';
    ?>
    <?php 
        include 'menu.inc';
    ?>

<div class="container">
        <div class="search-container">
            <div class="search-box">
                <input type="text" placeholder="Search">
            </div>
            <select>
                <option value="">Location</option>
                <option>Ha Noi</option>
                <option>Đa Nang</option>
                <option>TP HCM</option>
                <option>Can Tho</option>
                <option>Hai Phong</option>
                <option>Ca Mau</option>
                <option>Quang Ninh</option>
                <option>International</option>
            </select>
            <select>
                <option value="">Salary</option>
                <option>Up to 10M</option>
                <option>10M - 30M</option>
                <option>30M - 50M</option>
                <option>Above 50M</option>
            </select>
            <button class="search-btn" value="jobs-search">Search</button>
        </div>

        <div class="jobs-grid">
            <?php
                require_once "settings.php";
                $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
                
                if ($conn) {
                    $query = "SELECT * FROM jobs";
                    $result = mysqli_query($conn, $query);
                    
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="job-card">';
                            echo '<div class="job-header">';
                            echo '<h3 class="job-title">' . $row["title"] . '</h3>';
                            if (isset($row["hot"]) && $row["hot"] == 1) {
                                echo '<span class="hot-tag">Hot</span>';
                            }
                            if (isset($row["new"]) && $row["new"] == 1) {
                                echo '<span class="hot-tag">New</span>';
                            }
                            echo '</div>';
                            echo '<div class="job-info">';
                            echo '<span>' . $row["salary"] . '</span>';
                            echo '<span>' . $row["type"] . '</span>';
                            echo '</div>';
                            echo '<div class="job-info">';
                            echo '<span>' . $row["level"] . '</span>';
                            echo '<span>' . $row["location"] . '</span>';
                            echo '</div>';
                            
                            // Manual linking based on job title
                            $job_links = [
                                "Sales Executive (International Market)" => "job_detail/SE(IM).html",
                                "Sales Manager (HCM)" => "job_detail/SM.html",
                                "Senior AI Engineer" => "job_detail/SAE.html",
                                "Technical Project Manager" => "job_detail/TPM.html",
                                "Senior Solutions Architect / Consultant" => "job_detail/SSA.html",
                                "Intern Project Coordinator" => "job_detail/IPC.html",
                                "Production Support" => "job_detail/PS.html",
                                "Mid/Senior International Sales" => "job_detail/MSIS.html",
                                "Bridge System Engineer (BrSE)" => "job_detail/BSE.html",
                            ];
                            
                            if (isset($job_links[$row["title"]])) {
                                echo '<a href="' . $job_links[$row["title"]] . '" class="view-more">View more</a>';
                            } else {
                                echo '<a href="#" class="view-more">View more</a>'; // Placeholder if no link found
                            }
                            
                            echo '</div>';
                        }
                    } else {
                        echo "<p>There is no information to display</p>";
                    }
                    
                    mysqli_close($conn);
                } else {
                    echo "<p>Unable to connect to the database.</p>";
                }
            ?>
        </div>
    </div>
    
    <?php 
        include 'footer.inc';
    ?>
</body>
</html>