<header>
<div id="navbar" class="obj-width">
    <a href="index.php"><img class="logo" src="images/4tl-logo.png" alt="4TL Logo"></a>
    <!--responsive navbar-->
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
        <?php
        session_start();
        if (isset($_SESSION["role"])) {
            if ($_SESSION["role"] === "manager") {
                echo '<ul class="menu">';
                    echo '<li><a href="manage.php">Manage</a></li>';
                    echo '<li><a href="jobs.php">Jobs</a></li>';
                    echo '<li><a href="about.php">About</a></li>';
                    echo '<li><a href="apply.php">Apply</a></li>';
                    echo '<li><a href="enhancecon.php">Enhancements</a></li>';
                echo '</ul>';
            } else {
                echo '<ul class="menu">';
                    echo '<li><a href="jobs.php">Jobs</a></li>';
                    echo '<li><a href="about.php">About</a></li>';
                    echo '<li><a href="apply.php">Apply</a></li>';
                    echo '<li><a href="enhancecon.php">Enhancements</a></li>';
                echo '</ul>';
            }
            echo '<a href="logout.php" id="loginout">Logout</a>';
        } else {
            echo '<a href="login.php" id="loginout">Login</a>';
        }
        ?>
    <label for="nav-toggle" class="nav-toggle-label">
        <i class='bx bx-menu'></i>
    </label>
</div>
</header>
