
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iJuanaBeSafe | Login</title>
    <link rel="icon" type="image/png" href="assets/images/logowoname.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background: #F3F2F7;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box py-5" style="background: #4F9EFA;">
                <div class="featured-image mb-3">
                    <p class="text-white fs-2">iJuanaBeSafe</p>
                    <img src="assets/images/login-sup.png" class="img-fluid" style="width: 250px;">
                </div>
                <small class="text-white text-wrap text-center fs-5">Cloud-Based Gender-Based Violence Reporting and Analytics System for Pangasinan State University</small>
            </div> 
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2 class="fw-bold fs-1 pt-lg-5" style="color: #4F9EFA">LOGIN</h2>
                    </div>
                    <?php
                        require("config.php");
                        session_start();

                        if (isset($_POST['login'])) {
                            $email = clean_data($_POST['email']);
                            $password = clean_data($_POST['password']);

                            $checkCoordinatorQuery = $connect->query("SELECT * FROM coordinators WHERE email='$email' AND password='$password'");

                            if ($checkCoordinatorQuery->num_rows == 1) {
                                $row = $checkCoordinatorQuery->fetch_array();
                                $_SESSION['email'] = $row['email'];
                                header("Location: home.php");
                            } else {
                                $hashed_password = md5($password);
                                $checkQuery = $connect->query("SELECT * FROM user WHERE email='$email' AND password='$hashed_password'");

                                if ($checkQuery->num_rows == 1) {
                                    $row = $checkQuery->fetch_array();
                                    $_SESSION['username'] = $row['username'];
                                    $_SESSION['email'] = $row['email'];
                                    $_SESSION['campus'] = $row['campus'];
                                    header("Location: home-student.php");
                                } else {
                                    echo "<div class='alert alert-danger pb-0'><p>Wrong email or password.</p></div>";
                                }
                            }
                        }

                        function clean_data($input)
                        {
                            $input = htmlspecialchars($input);
                            $input = trim($input);
                            $input = stripslashes($input);
                            return $input;
                        }
                    ?>
                    <form action="" method="POST" >
                        <label for="email">Institutional Email:</label>
                        <div class="input-group mb-2">
                            <input name="email" type="text" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <label for="password">Password:</label>
                        <div class="input-group mb-1">
                            <input name="password" type="password" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <div class="input-group my-3">
                            <button name="login" class="btn w-100 fs-6" style="background-color: #4F9EFA; color: white">LOGIN</button>
                        </div>
                    </form>
                    <div class="row text-center">
                        <small>Don't have an account? <a href="register.php">Register Here.</a></small>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>