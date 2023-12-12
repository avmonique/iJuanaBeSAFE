<?php
 require("config.php");
 session_start();
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
      <title>iJuanaBeSAFE | Home</title>
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
        <h1 class="text fs-1 fw-bold pt-4">REPORTS</h1>
        <div class="row">
            <div class='col-md-7'>


              <!-- display yung mga reports from the database -->
                <?php
                
                $sql = "SELECT * FROM reports INNER JOIN user ON user.email = reports.email";
                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card mb-3'>";
                        echo "<div class='row g-0'>";
                        echo "<div class='col-md-4'>";
                        echo "<img src='" . $row["picture_path"] . "' alt='Report Image' class='img-fluid rounded-start'>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>".$row['username']." <small class='text-muted'>" . $row['dateReported'] . "</small></h5>";
                        echo "<p class='card-text'>" . $row['description'] . "</p>";
                        echo "<button class='comment'>";
                        echo "<i class='bx bx-comment-detail'></i>";
                        echo "<a href='#'>Add A Comment</a>";
                        echo "</button>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No reports available.</p>";
                }
                ?>
            </div>

            <div class="col-md-5 sticky-column d-md-block d-none">
                <div class="card">
                    <ul>
                        <h2>My Reports</h2>
                        <?php
                        $email = $_SESSION['email'];
                
                        $sql = "SELECT * FROM reports WHERE email = '$email'";

                $result = $connect->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card mb-3'>";
                        echo "<div class='row g-0'>";
                        echo "<div class='col-md-4'>";
                        echo "<img src='" . $row["picture_path"] . "' alt='Report Image' class='img-fluid rounded-start'>";
                        echo "</div>";
                        echo "<div class='col-md-8'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>".$row['email']." <small class='text-muted'>" . $row['dateReported'] . "</small></h5>";
                        echo "<p class='card-text'>" . $row['description'] . "</p>";
                        echo "<button class='comment'>";
                        echo "<i class='bx bx-comment-detail'></i>";
                        echo "<a href='#'>Add A Comment</a>";
                        echo "</button>";
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
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button class="btn-blue">
          <a href="#">
              <i class='bx bx-edit-alt'></i>
              <span class="link_name">Report A Case</span>
          </a>
        </button>
</section>

    
    <script>
          $(document).ready(function () {
              $('.btn-blue').click(function () {
                  (async () => {
                      const { value: formValues } = await Swal.fire({
                          title: 'Report A Case',
                          html: `
                              
                              <form id="reportForm" enctype='multipart/form-data' method='POST'>
                                  
                                  <label for="violenceType" class="fw-bold">Type of Violence:</label>
                                  <select class='form-control' id="violenceType" name="violenceType" class="swal2-input" required>
                                      <option value="Physical Violence">Physical Violence</option>
                                      <option value="Sexual Violence">Sexual Violence</option>
                                      <option value="Emotional Violence">Emotional Violence</option>
                                      <option value="Psychological Violence">Psychological Violence</option>
                                      <option value="Spiritual Violence">Spiritual Violence</option>
                                      <option value="Verbal Abuse">Verbal Abuse</option>
                                      <option value="Financial Abuse">Financial Abuse</option>
                                  </select>
                                  <label for="violence" class="fw-bold mt-2">Violence:</label>
                                  <input class="form-control" type="text" id="violence" required>
                                  <label for="location" class="fw-bold mt-2">Location:</label>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="location" value="Inside Campus" checked>
                                      <label class="form-check-label" for="location" class="fw-bold">
                                          Inside the campus
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="location" value="Outside Campus">
                                      <label class="form-check-label" for="location">
                                          Outside the campus
                                      </label>
                                  </div>
                                  <label for="description" class="fw-bold mt-2">Description:</label>
                                  <textarea id="description" class='form-control' name="description" required></textarea>

                                  <label for="picture_path" class="mt-2">Upload an Image: (Optional)</label>
                                  <input class='form-control' type="file" name="picture_path">
                              </form>`,
                          showCancelButton: true,
                          confirmButtonColor: "#4F9EFA",
                          confirmButtonText: "Submit",
                          focusConfirm: false,
                          preConfirm: () => {
                            const violence = $('#violence').val();
                        const description = $('#description').val();

                        if (!violence || !description) {
                            Swal.showValidationMessage('Please fill out all required fields.');
                            return false;
                        }

                        var formData = new FormData();
                        formData.append('location', $('input[name="location"]:checked').val());
                        formData.append('violenceType', $('#violenceType').val());
                        formData.append('violence', violence);
                        formData.append('description', description);
                        formData.append('picture_path', $('input[name="picture_path"]')[0].files[0]);

                        $.ajax({
                            url: 'process-report.php',
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                response = JSON.parse(response);

                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.message,
                                        confirmButtonColor: "#4F9EFA",
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: response.message,
                                        confirmButtonColor: "#4F9EFA",
                                    });
                                }
                            },
                            error: function () {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while processing your request.',
                                });
                            }
                        });
                        return true;
                          }
                      });
                  })();
              });
          });
      </script>


    <script src="assets/script.js"></script>
  </body>
  </html>