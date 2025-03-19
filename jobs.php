<!DOCTYPE html>
<html lang="en">

<?php
    include 'header.inc'
    ?>
<body class="jobs-body">
    <!-- Header -->
    <?php 
        include 'menu.inc'
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
            <button class="search-btn">Search</button>
        </div>

        <div class="jobs-grid">
            <div class="job-card" style="--order: 1">
                <div class="job-header">
                    <h3 class="job-title">Sales Executive (International Market)</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Up to 500M/year</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Middle</span>
                    <span>Fukuoka, Japan</span>
                </div>
                <div class="tags">
                    <span class="tag">International Sales</span>
                    <span class="tag">Japanese</span>
                    <span class="tag">Korean</span>
                </div>
                <a href="job_detail/SE(IM).html" class="view-more">View more</a>
            </div>

            <div class="job-card" style="--order: 2">
                <div class="job-header">
                    <h3 class="job-title">Sales Manager – HCM</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Up to $2,500</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Manager</span>
                    <span>HCM city</span>
                </div>
                <div class="tags">
                    <span class="tag">Sales</span>
                </div>
                <a href="job_detail/SM.html" class="view-more">View more</a>
            </div>

            <div class="job-card" style="--order: 3">
                <div class="job-header">
                    <h3 class="job-title">Senior AI Engineer</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Up to 50M</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Senior</span>
                    <span>Ha Noi</span>
                </div>
                <a href="job_detail/SAE.html" class="view-more">View more</a>
            </div>

            <div class="job-card" style="--order: 4">
                <div class="job-header">
                    <h3 class="job-title">Technical Project Manager</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Up to 40M</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Senior</span>
                    <span>Đa Nang</span>
                </div>
                <a href="job_detail/TPM.html" class="view-more">View more</a>
            </div>
            <div class="job-card" style="--order: 5">
                <div class="job-header">
                    <h3 class="job-title">Senior Solutions Architect / Consultant</h3>
                    <span class="hot-tag">New</span>
                </div>
                <div class="job-info">
                    <span>40M - 100M</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Manager</span>
                    <span>Ho Chi Minh city</span>
                </div>
                <a href="job_detail/SSA.html" class="view-more">View more</a>
            </div>
            <div class="job-card" style="--order: 6">
                <div class="job-header">
                    <h3 class="job-title">Intern Project Coordinator</h3>
                    <span class="hot-tag">New</span>
                </div>
                <div class="job-info">
                    <span>4M</span>
                    <span>Part Time</span>
                </div>
                <div class="job-info">
                    <span>Intern</span>
                    <span>Ha Noi</span>
                </div>
                <div class="tags">
                    <span class="tag">English</span>
                    <span class="tag">Japanese</span>
                </div>
                <a href="job_detail/IPC.html" class="view-more">View more</a>
            </div>
            <div class="job-card" style="--order: 7">
                <div class="job-header">
                    <h3 class="job-title">Production Support</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Up to 45M</span>
                    <span>Full time</span>
                </div>
                <div class="job-info">
                    <span>Junior-Mid</span>
                    <span>Remote</span>
                </div>
                <a href="job_detail/PS.html" class="view-more">View more</a>
            </div>
            <div class="job-card" style="--order: 8">
                <div class="job-header">
                    <h3 class="job-title">Mid/Senior International Sales</h3>
                    <span class="hot-tag">Hot</span>
                </div>
                <div class="job-info">
                    <span>Negotiation</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Mid-Senior</span>
                    <span>TP HCM</span>
                </div>
                <div class="tags">
                    <span class="tag">International</span>
                    <span class="tag">Chinese</span>
                </div>
                <a href="job_detail/MSIS.html" class="view-more">View more</a>
            </div>
            <div class="job-card" style="--order: 9">
                <div class="job-header">
                    <h3 class="job-title">Bridge System Engineer (BrSE) - Japan</h3>
                    <span class="hot-tag">New</span>
                </div>
                <div class="job-info">
                    <span>80M - 100M</span>
                    <span>Full Time</span>
                </div>
                <div class="job-info">
                    <span>Senior</span>
                    <span>Tokyo_Japan</span>
                </div>
                <a href="job_detail/BSE.html" class="view-more">View more</a>
            </div>
        </div>
    </div>
    <?php
        include 'footer.inc'
    ?>
</body>
