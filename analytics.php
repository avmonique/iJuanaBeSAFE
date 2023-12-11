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
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart() {
        // kunin nalang yung value sa database
        // example category sa campus, kung ilang report cases 
        var data = google.visualization.arrayToDataTable([
          ['Campus', 'Cases'],
          ['Asingan', 11], // yung mga number dito, kukunin sa database
          ['Bayambang', 2],
          ['Binmaley', 2],
          ['Infanta', 2],
          ['Lingayen', 7],
          ['San Carlos', 5],
          ['Sta. Maria', 5],
          ['Urdaneta', 30]
        ]);

        var options = {
          title: 'Campus Report Cases',
          width: '100%', // Set the width to 100%
          height: 300,   // Set the height as needed
          chartArea: {
            width: '80%',  // Set the chart area width to 80%
          },
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      function drawChart2() {
        var data = google.visualization.arrayToDataTable([
          ['Violations', 'Cases'],
          ['Physical Violence', 15], // yung mga number dito, kukunin sa database
          ['Sexual Violence', 4],
          ['Emotional Violence', 6],
          ['Psychological Violence', 7],
          ['Spiritual Violence', 7],
          ['Cultural Violence', 8],
          ['Verbal Abuse', 5],
          ['Financial Abuse', 10],
        ]);

        
        var options = {
            title: 'Types of Violence and Abuse',
            width: '100%', // Set the width to 100%
            height: 300,   // Set the height as needed
            chartArea: {
                width: '80%',  // Set the chart area width to 80%
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
    <div class="home-section">
        <div class="container">
        <h1 class="text fs-1 fw-bold pt-4">DATA ANALYTICS</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                      <h2>Total Reports</h2>

                    </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <h2>Inside Campus</h2>

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card">
                    <h2>Outside Campus</h2>

                  </div>
                </div>
                <div class="col-md-6">
                    <div id="piechart"></div>
                    <!-- <h1 style="background-color: red">ONE</h1> -->
                </div>
                <div class="col-md-6">
                    <!-- <h1 style="background-color: blue">TWO</h1> -->
                    <div id="piechart2"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
