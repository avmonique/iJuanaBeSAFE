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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/homecss.css">
      <title>iJuanaBeSAFE | View Report</title>
      <link rel="icon" type="image/png" href="assets/images/logowoname.png">
      <style>
        .home-section .btn-blue {
              background-color: #4F9EFA;
              padding: 13px 35px;
              border-radius: 50px;
              border: none;
              position: fixed; 
              bottom: 50px; 
              right: 50px; 
              overflow-y: auto;
              z-index: 1000;
          }

          .btn-blue a {
              text-decoration: none;
              color: white;   
          }

          button.btn-blue:hover {
              background-color: #4b89cf;
          }
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
            <i class='bx bx-user' ></i>
            <span class="link_name">Hello, <?php echo $_SESSION['username'] . "!"; ?></span>
          </a>
          <span class="tooltip"><?php echo $_SESSION['username']; ?></span>
        </li> 
        <li>
          <a href="home-student.php">
            <i class='bx bx-objects-horizontal-right'></i>
            <span class="link_name">Reports</span>
          </a>
          <span class="tooltip">Reports</span>
        </li> 
        <li>
          <a href="messages-student.php">
            <i class="bx bx-chat"></i>
            <span class="link_name">Messages</span>
          </a>
          <span class="tooltip">Messages</span>
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
            <h1 class="text fs-1 fw-bold pt-4">VIEW REPORT</h1>
            <?php
require "config.php";
if(isset($_GET['reportID'])) {
    $report_id = $_GET['reportID'];
     
                $sql = "SELECT * FROM reports INNER JOIN user ON user.email = reports.email WHERE reportID = '$report_id'";
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
                
                        echo "<div class='card-body p-4'>";
                        echo "<div class='avatar rounded-circle text-center text-white' style='background: #4F9EFA; float: left; width: 35px; height: 35px; line-height: 35px; font-size: 14px;'>";
                        echo getInitials($row['firstname'] . " " . $row['lastname']);
                        echo "</div>";
                        echo "<h5 class='card-title ms-5 mt-1' style='margin-left: 10px;'>" . $row['username'] . " <small class='text-muted' style='font-size: 13px'>" . $row['dateReported'] . "</small></h5>";
                        echo "<p class='card-text p-1'>" . $row['description'] . "</p>";
                
                        // Display the comments section within the same card
                        echo "<div class='comments-section'>";
                
                        // Fetch comments related to this report
                        $comments_sql = "SELECT comments.*, user.username AS commenter_username
                                         FROM comments 
                                         INNER JOIN user ON comments.commenter_email = user.email 
                                         WHERE comments.reportID = '$report_id';";
                        $comments_result = $connect->query($comments_sql);
                        echo "<h5>Comments:</h5>";
                        if ($comments_result->num_rows > 0) {
                            while ($comment_row = $comments_result->fetch_assoc()) {
                                
                                echo "<div class='card mb-3'>";
                                echo "<div class='row g-0'>";
                                echo "<div class='card-body p-4'>";
                                echo "<div class='avatar rounded-circle text-center text-white' style='background: #4F9EFA; float: left; width: 35px; height: 35px; line-height: 35px; font-size: 14px;'>";
                                echo getInitials($comment_row['commenter_username']);
                                echo "</div>";
                                echo "<h5 class='card-title ms-5 mt-1' style='margin-left: 10px;'>" . $comment_row['commenter_username'] . " <small class='text-muted' style='font-size: 13px'>" . $comment_row['comment_date'] . "</small></h5>";
                                echo "<p class='card-text p-1'>" . $comment_row['comment_text'] . "</p>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No comments available.</p>";
                        }
                
                        // Comment submission form
                        echo "<form action='submit-comment.php' method='post'>";
                        echo "<input  type='hidden' name='report_id' value='" . $report_id . "'>";
                        echo "<label for='comment'>Type your comment:</label>";
                        echo "<textarea class='form-control' name='comment'></textarea>";
                        echo "<button class='btn btn-primary mt-2' type='submit'>Submit Comment</button>";
                        echo "</form>";
                        echo "<a href='home-student.php' class='btn btn-secondary mt-2' type='submit'>Go Back</a>";
                
                        echo "</div>"; // Closing comments-section
                
                        echo "</div>"; // Closing card-body
                        echo "</div>"; // Closing col or col-md-8
                        echo "</div>"; // Closing row g-0
                        echo "</div>"; // Closing card
                    }
                } else {
                    echo "<p>No reports available.</p>";
                }
            }
?>

        </div>
    </section>

    <script src="assets/script.js"></script>
  </body>
  </html>