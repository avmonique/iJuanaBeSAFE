<?php
require "config.php";
session_start();

$response = array(); // Initialize response array

if (isset($_POST["violenceType"])) {
    $email = $_SESSION['email'];
    $location = $_POST['location'];
    $violenceType = $_POST['violenceType'];
    $violence = $_POST['violence'];
    $description = $_POST['description'];
    $errorMessage = "";

    $targetDirectory = "images/";

    if (!empty($_FILES["picture_path"]["name"])) {
        $targetFile = $targetDirectory . basename($_FILES["picture_path"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            $errorMessage = "Sorry, only JPG, JPEG, and PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk) {
            if (move_uploaded_file($_FILES["picture_path"]["tmp_name"], $targetFile)) {
                $sql = "INSERT INTO reports (email, location, violenceType, violence, description, picture_path, dateReported) VALUES ('$email', '$location', '$violenceType', '$violence', '$description', '$targetFile', NOW())";
                if (mysqli_query($connect, $sql)) {
                    $response['success'] = true;
                    $response['message'] = "Report successfully submitted.";
                    echo json_encode($response);
                    exit();
                }
            } else {
                $errorMessage = "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        $sql = "INSERT INTO reports (email, location, violenceType, violence, description, dateReported) VALUES ('$email', '$location', '$violenceType', '$violence', '$description', NOW())";
        if (mysqli_query($connect, $sql)) {
            $response['success'] = true;
            $response['message'] = "Report successfully submitted.";
            echo json_encode($response);
            exit();
        } else {
            $errorMessage = "Error creating record: " . mysqli_error($connect);
        }
    }

    // If execution reaches here, there was an error
    $response['success'] = false;
    $response['message'] = $errorMessage;
    echo json_encode($response);
}
?>
