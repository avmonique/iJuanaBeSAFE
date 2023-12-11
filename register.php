<?php
    require("config.php");
    session_start();

    $errorMsg = "";
    $successMsg = "";

    if (isset($_POST['register'])) {
        $firstname = clean_data($_POST['firstname']);
        $lastname = clean_data($_POST['lastname']);
        $campus = clean_data($_POST['campus']);
        $email = clean_data($_POST['email']);
        $username = clean_data($_POST['username']);
        $password = clean_data(md5($_POST['password']));

        $checkUsernameQuery = $connect->query("SELECT * FROM user WHERE email='$email' ");
        if ($checkUsernameQuery->num_rows > 0) {
            $errorMsg = "Email already registered.";
        } else {
            $insertQuery = $connect->query("INSERT INTO user (firstname,lastname,campus,email,username, password) VALUES ('$firstname', '$lastname', '$campus','$email', '$username', '$password')");

            if ($insertQuery) {
                $_SESSION['username'] = $username;
                $successMsg = "Registration successful. Redirecting...";
                header("refresh:3; login.php");
            } else {
                $errorMsg = "Registration failed. Please try again.";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iJuanaBeSafe | Register</title>
    <link rel="icon" type="image/png" href="assets/images/logowoname.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body style="background: #F3F2F7;">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #4F9EFA;">
                <div class="featured-image mb-3">
                    <p class="text-white fs-2">iJuanaBeSafe</p>
                    <img src="assets/images/login-sup.png" class="img-fluid" style="width: 250px;">
                </div>
                <small class="text-white text-wrap text-center fs-5">Cloud-Based Gender-Based Violence Reporting and Analytics System for Pangasinan State University</small>
            </div> 
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text text-center">
                        <h2 class="fw-bold fs-1" style="color: #4F9EFA">REGISTER</h2>
                    </div>
                    <?php
                        if ($errorMsg !== "") {
                            echo '<div class="alert alert-danger" role="alert">' . $errorMsg . '</div>';
                        } elseif ($successMsg !== "") {
                            echo '<div class="alert alert-success" role="alert">' . $successMsg . '</div>';
                        }
                    ?>
                    <form action="" method="post">
                        <label for="firstname">First Name:</label>
                        <div class="input-group mb-2">
                            <input name="firstname" type="text" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <label for="lastname">Last Name:</label>
                        <div class="input-group mb-2">
                            <input name="lastname" type="text" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <label for="campus">Select Campus:</label>
                        <div class="input-group mb-2">
                            <select name="campus" id="" class="form-control form-control-lg bg-light fs-6" required>
                                <option value="choose"></option>
                                <option value="Alaminos">Alaminos</option>
                                <option value="Asingan">Asingan</option>
                                <option value="Bayambang">Bayambang</option>
                                <option value="Binmaley">Binmaley</option>
                                <option value="Infanta">Infanta</option>
                                <option value="Lingayen">Lingayen</option>
                                <option value="San carlos">San Carlos</option>
                                <option value="Sta maria">Sta. Maria</option>
                                <option value="Urdaneta">Urdaneta</option>
                            </select>
                        </div>
                        <label for="username">Username:</label>
                        <div class="input-group mb-1">
                            <input name="username" type="text" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <label for="email">Email Address:</label>
                        <div class="input-group mb-2">
                            <input name="email" type="text" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <label for="username">Password:</label>
                        <div class="input-group mb-1">
                            <input name="password" type="password" class="form-control form-control-lg bg-light fs-6" required>
                        </div>
                        <div class="input-group my-2">
                            <button name="register" class="btn w-100 fs-6" style="background-color: #4F9EFA; color: white">REGISTER</button>
                        </div>
                    </form>
                    <div class="row text-center">
                        <small>Already have an account? <a href="login.php">Login Here.</a></small>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>