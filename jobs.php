<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc';
?>

<body class="jobs-body">
    <?php 
        include 'menu.inc';
    ?>

    <div class="container">
        <div class="search-container">
            <form method="POST" action="" class="jobsform">
                <div class="search-box">
                    <input type="text" name="search_query" placeholder="Search" value="<?php echo isset($_POST['search_query']) ? htmlspecialchars($_POST['search_query']) : ''; ?>">
                </div>
                <select name="location">
                    <option value="">Location</option>
                    <?php 
                    $locations = ["Ha Noi", "Da Nang", "HCM city", "Can Tho", "Hai Phong", "Ca Mau", "Quang Ninh", "Fukuoka, Japan", "Tokyo - Japan"];
                    foreach ($locations as $loc) {
                        $selected = (isset($_POST['location']) && $_POST['location'] == $loc) ? "selected" : "";
                        echo "<option value='$loc' $selected>$loc</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="search-btn" name="search" value="jobs-search">Search</button>
            </form>
        </div>

        <div class="jobs-grid">
            <?php
            require_once "settings.php";
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);

            if ($conn) {
                // Base query
                $query = "SELECT * FROM jobs WHERE 1=1";
                $params = [];
                $types = "";

                // Check search input
                if (!empty($_POST['search_query'])) {
                    $query .= " AND title LIKE ?";
                    $params[] = "%" . $_POST['search_query'] . "%";
                    $types .= "s";
                }

                // Check location filter
                if (!empty($_POST['location'])) {
                    $query .= " AND location = ?";
                    $params[] = $_POST['location'] ;
                    $types .= "s";
                }

                // Prepare and execute query
                $stmt = mysqli_prepare($conn, $query);
                if (!empty($params)) {
                    switch (count($params)) {
                        case 1:
                            mysqli_stmt_bind_param($stmt, $types, $params[0]);
                            break;
                        case 2:
                            mysqli_stmt_bind_param($stmt, $types, $params[0], $params[1]);
                            break;
                        default:
                            die("Too many parameters.");
                    }
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                // Display results
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="job-card">';
                        echo '<div class="job-header">';
                        echo '<h3 class="job-title">' . htmlspecialchars($row["title"]) . '</h3>';
                        if ($row["hot"] == 1) {
                            echo '<span class="hot-tag">Hot</span>';
                        }
                        if ($row["new"] == 1) {
                            echo '<span class="hot-tag">New</span>';
                        }
                        echo '</div>';
                        echo '<div class="job-info">';
                        echo '<span>' . htmlspecialchars($row["salary"]) . '</span>';
                        echo '<span>' . htmlspecialchars($row["type"]) . '</span>';
                        echo '</div>';
                        echo '<div class="job-info">';
                        echo '<span>' . htmlspecialchars($row["level"]) . '</span>';
                        echo '<span>' . htmlspecialchars($row["location"]) . '</span>';
                        echo '</div>';

                        // Job links
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
                            echo '<a href="#" class="view-more">View more</a>'; // Default if no link found
                        }

                        echo '</div>';
                    }
                } else {
                    echo "<p>No jobs found matching your criteria.</p>";
                }   

                mysqli_stmt_close($stmt);
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