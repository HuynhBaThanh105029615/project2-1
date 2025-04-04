<!DOCTYPE html>
<html lang="en">
<?php
    include 'header.inc';
?>
<body class="phpenhancements-body">
    <!-- Header -->
    <?php
        include 'menu.inc';
    ?>
    <div class="phpenhance1">
        <h2>Sorting by order<h2>
        <p>We've introduced a sorting by order enhancement in manage.php to improve the efficiency of managing job listings. This new feature allows users to sort job records based on different criteria
            ensuring quick access to relevant information. By clicking on the respective column headers, administrators can now seamlessly arrange job listings in ascending or descending order, making it easier to analyze and organize data. This enhancement enhances usability, reduces time spent searching for specific jobs, and provides a more streamlined management experience.</p>
            <img src="images/Screenshot 2025-04-04 090042.png" alt="picture of the sorting order fuction" class="imgenphp">
            <img src="images/Screenshot 2025-04-04 090105.png" alt="picture of the sorting order fuction2" class="imgenphp">
    </div>
    <div class="phpenhance2">
        <h2>Admin and User platform<h2>
        <p>The platform has different navigation options for users and administrators. Users can access Index, Jobs, About, Apply, and Enhancements. Administrators have the same options but with an additional Manage tab for handling job applications.</p>
        <dl>
            <dt>User interface:</dt>
            <df><img src="images/Screenshot 2025-04-04 094045.png" alt="user interface pic" class="imgenphp2"></df>
            <dt>Manager interface:</dt>
            <df><img src="images/Screenshot 2025-04-04 094028.png" alt="manager interface pic" class="imgenphp2"></df>
        </dl>
    </div>
    <div class="phpenhance3">
        <h2>Register function</h2>
        <p>The platform includes a registration function that allows users to create an account. When registering, their username and password are saved in the database, enabling them to log in and access user page.</p>
            <img src="images/Screenshot 2025-04-04 100116.png" alt="loginint" class="imgenphp3">
            <img src="images/Screenshot 2025-04-04 100832.png" alt="regint" class="imgenphp3">
    </div>
    <?php
        include 'footer.inc';
    ?>
</body>
</html>