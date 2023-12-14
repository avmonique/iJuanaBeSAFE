<?php
require "config.php";
session_start();

if (isset($_SESSION['email'])) {
    $coordinatorEmail = $_SESSION['email'];

    $sql = "SELECT campus FROM coordinators WHERE email = '$coordinatorEmail'";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $coordinatorCampus = $row['campus'];

        $campus = $coordinatorCampus;
        $sqlTotalReports = "SELECT COUNT(*) AS total FROM user INNER JOIN reports ON reports.email = user.email WHERE user.campus = '$campus';";
        $sqlInsideCampus = "SELECT COUNT(*) AS inside FROM reports INNER JOIN user ON user.email = reports.email  WHERE campus = '$campus' AND location = 'Inside Campus'";
        $sqlOutsideCampus = "SELECT COUNT(*) AS outside FROM reports INNER JOIN user ON user.email = reports.email  WHERE campus = '$campus' AND location = 'Outside Campus'";
      
      } else {
        echo "Campus not found";
    }
} else {
    echo "Session not found";
}
?>

  <!DOCTYPE html> 
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>iJuanaBeSAFE | Data Analytics</title>
      <link rel="icon" type="image/png" href="assets/images/logowoname.png">
      <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/homecss.css">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart() {
          var jsonData = $.ajax({
              url: "get-campus-data.php",
              dataType: "json",
              async: false
          }).responseText;

          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Campus');
          data.addColumn('number', 'Cases');
          
          jsonData = JSON.parse(jsonData);
          data.addRows(jsonData);

          var options = {
              title: 'Campus Report Cases',
              width: '100%',
              height: 300,
              chartArea: {
                  width: '80%',
              },
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
          chart.draw(data, options);
        }

        function drawChart2() {
              var jsonData = $.ajax({
              url: "get-violence-data.php",
              dataType: "json",
              async: false
          }).responseText;

          jsonData = JSON.parse(jsonData);

          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Violence Type');
          data.addColumn('number', 'Cases');
          data.addRows(jsonData);

          var options = {
              title: 'Violence and Abuse Reports',
              width: '100%',
              height: 300,
              chartArea: {
                  width: '80%',
              },
          };

          var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
          chart.draw(data, options);
        }
      </script>
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
          <a href="home.php">
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
      <div class="home-section">
          <div class="container">
          <h1 class="text fs-1 fw-bold pt-4">DATA ANALYTICS</h1>
            <h2><?php echo $campus . " Campus"; ?></h2>
              <div class="row">
                  <div class="col-md-4">
                      <div class="card mb-lg-4">
                        <h3 class="p-3 fw-bold">Total Reports</h3>
                        <!-- display total reports here -->
                        <?php
                        if (isset($sqlTotalReports)) {
                            $result = $connect->query($sqlTotalReports);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h2 class='text-center pb-3'>" . $row['total'] . "</h2>";
                            } else {
                                echo "No reports found";
                            }
                        }
                        ?>
                      </div>
                  </div>
                  <div class="col-md-4">
                    <div class="card mb-lg-4">
                    <h3 class="ps-3 pt-3 fw-bold">Total Reports</h3>
                    <h5 class="ps-3">Inside the campus</h5>
                        <!-- display total reports Inside the campus here -->
                        <?php
                        if (isset($sqlInsideCampus)) {
                            $result = $connect->query($sqlInsideCampus);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h2 class='text-center'>" . $row['inside'] . "</h2>";
                            } else {
                                echo "No reports found";
                            }
                        }
                        ?>
                    </div>
                  </div>
                  <div class="col-md-4">
                  <div class="card mb-lg-4">
                    <h3 class="ps-3 pt-3 fw-bold">Total Reports</h3>
                    <h5 class="ps-3">Outside the campus</h5>
                        <!-- display total reports Inside the campus here -->
                        <?php
                        if (isset($sqlOutsideCampus)) {
                            $result = $connect->query($sqlOutsideCampus);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                echo "<h2 class='text-center'>" . $row['outside'] . "</h2>";
                            } else {
                                echo "No reports found";
                            }
                        }
                        ?>
                  </div>
                  
              </div>
              <div class="row">
              <div class="col-md-6">
                      <div id="piechart"></div>
                  </div>
                  <div class="col-md-6">
                      <div id="piechart2"></div>
                  </div>
              </div>
          </div>
      </div>


      <script src="script.js"></script>
  </body>
  </html>
