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
              max-height: 150px; 
              overflow-y: auto;
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
      <li>
        <a href="messages.php">
          <i class="bx bx-chat"></i>
          <span class="link_name">Messages</span>
        </a>
        <span class="tooltip">Messages</span>
      </li>
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
          <div class="col-md-7">
            <div class="card">
              <div class="row">
                <div class="col-md-6">
                  <img src="https://images.pexels.com/photos/16143559/pexels-photo-16143559/free-photo-of-landscape-of-rocky-snowcapped-mountains.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img" alt="" />
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <h5 class="card-title">Username <small class="text-muted">Datetime of report</small></h5>
                    <p class="card-text">Report description</p>
                    <button class="comment">
                      <i class='bx bx-comment-detail'></i>
                      <a href="#">Add A Comment</a>
                    </button>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="col-md-5 sticky-column d-md-block d-none">
          <div class="card">
            <ul>
              <h4>Filter reports by:</h4>
              <li><a href="">Physical Violence</a></li>
              <li><a href="">Sexual Violence</a></li>
              <li><a href="">Emotional Violence</a></li>
              <li><a href="">Psychological Violence</a></li>
              <li><a href="">Spiritual Violence</a></li>
              <li><a href="">Cultural Violence</a></li>
              <li><a href="">Verbal Abuse</a></li>
              <li><a href="">Financial Abuse</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="assets/script.js"></script>
</body>
</html>
