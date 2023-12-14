
<?php
 require("config.php");
 session_start();
 if(!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/homecss.css">
    <title>iJuanaBeSAFE | Home</title>
    <link rel="icon" type="image/png" href="assets/images/logowoname.png">
    <style>
      .home-section .comment {
            border: none;
            background: none;
          }
          .home-section .comment a {
            text-decoration: none;
            color: #4F9EFA;
          }
          .home-section .comment i {
            color: #4F9EFA;
          }
          @media (min-width: 990px) {
            .card-text {
              max-height: 100px; 
              overflow-y: hidden;
            }
          }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="logo_details">
      <i class='bx bx-donate-heart icon'></i>
      <div class="logo_name">iJuanaBeSAFE</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="#">
          <i class='bx bx-objects-horizontal-right'></i>
          <span class="link_name">Reports</span>
        </a>
        <span class="tooltip">Reports</span>
      </li> 
      <!-- <li>
        <a href="messages.php">
          <i class="bx bx-chat"></i>
          <span class="link_name">Messages</span>
        </a>
        <span class="tooltip">Messages</span>
      </li> -->
      <li>
        <a href="analytics.php">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="link_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="logout.php">
          <i class="bx bx-log-out"></i>
          <span class="link_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="container">
      <h1 class="text fs-1 fw-bold pt-4">REPORTS</h1>
        <div class="row">
          
          <?php
        // fetch-reports.php

        require("config.php");

        $sql = "SELECT * FROM reports INNER JOIN user ON user.email = reports.email ORDER BY dateReported DESC";
        $result = $connect->query($sql);

        function getInitials($name) {
          $words = explode(" ", $name);
          $initials = "";
          foreach ($words as $w) {
              $initials .= $w[0];
          }
          return $initials;
      }

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='col-md-6'>";
            echo "<div class='card mb-3'>";
            echo "<div class='row g-0'>";
            if (!empty($row["picture_path"])) {
              echo "<div class='col-md-4'>";
              echo "<img src='" . $row["picture_path"] . "' alt='Report Image' class='img-fluid rounded-start'>";
              echo "</div>";
              echo "<div class='col-md-8'>";
          } else {
              echo "<div class='col'>";
          }
            
            echo "<div class='card-body accordion p-4'>";
            echo "<div class='avatar rounded-circle text-center text-white' style='background: #4F9EFA; float: left; width: 35px; height: 35px; line-height: 35px; font-size: 14px;'>"; 
            echo getInitials($row['firstname'] . " " . $row['lastname']);
            echo "</div>";
            echo "<h5 class='card-title ms-5 mt-1' style='margin-left: 10px;'>" . $row['username'] . " <small class='text-muted' style='font-size: 13px'>" . $row['dateReported'] . "</small></h5>";
            echo "<p class='card-text p-1'>" . $row['description'] . "</p>";
            // echo "<button class='comment'>";
            // echo "<i class='bx bx-comment-detail'></i>";
            // echo "<a href='#'> Add A Comment</a>";
            // echo "</button>";
            echo "</div>";
            echo "</div>";
    
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>No reports available.</p>";
    }
      

        $connect->close();
        ?>

          </div>
        
      </div>
    </div>
  </section>


  <script src="assets/script.js"></script>
</body>
</html>
