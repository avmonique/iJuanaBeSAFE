<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/homecss.css">
    <title>iJuanaBeSAFE | Messages</title>
    <link rel="icon" type="image/png" href="assets/images/logowoname.png">
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
  <section class="home-section">
  <div class="container">
  <?php
$apiKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAtudosRn0qbNUGmZZcUuhoogK/Xeu6X11S1OQKL6TfvbdBKneGAWV79aswi4V9QEgQGp6ZN3X5XOBB0u8uNJ86S0M2cURx4GrZOS6YhZJTlmfrnWPoqpBFj7V84jszuVukPF7SUF9K3oErCv2JsIDqiq3yWSyjsi7vnY1xslcEs5qIE+vwFiY9af6bI/Xvm0ucgv7v3gw9prtcfAT/iCLqt5lC+T7lzIZBY71YbFWAFZ/M6/6EVtwsZPZFtNj39KuxGCKv47hL6qR93D9rMkZKKIK+HbOdl+qlC/wFocXwQXkZ3goUHhj+wgMUhdqlpwnwWAEWFf+v/K7BbJkj9+xEwIDAQAB'; // Replace with your actual API key

// Data for sending a message
$data = array(
    'message' => 'Hello from SCYET!',
    // Other necessary parameters as required by SCYET API
);

// Initialize cURL session
$ch = curl_init('https://us-ohio-api.sceyt.com');

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: Bearer ' . $apiKey,
    'Content-Type: application/json',
));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

// Execute cURL session and capture the response
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($ch);
} else {
    echo 'Message sent successfully!';
}

// Close cURL session
curl_close($ch);
?>

	</div>
  </section>


  <script src="assets/script.js"></script>
</body>
</html>
