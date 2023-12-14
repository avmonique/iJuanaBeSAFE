<?php
require("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reportID = $_POST['report_id'];
    $comment = $_POST['comment'];
    $userEmail = $_SESSION['email']; // Assuming the user's email is stored in the session
    
    // Prepare the SQL statement to insert the comment
    $sql = "INSERT INTO comments (reportID, commenter_email, comment_text, comment_date) VALUES (?, ?, ?, NOW())";
    
    // Prepare the prepared statement
    $stmt = $connect->prepare($sql);

    if ($stmt) {
        // Bind parameters to the statement
        $stmt->bind_param("iss", $reportID, $userEmail, $comment);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Comment inserted successfully
            // Redirect back to the report page after comment submission
            header("Location: add-comment.php?reportID=" . $reportID);
            exit();
        } else {
            // Error while executing the statement
            echo "Error: Unable to insert the comment.";
        }
    } else {
        // Error while preparing the statement
        echo "Error: Unable to prepare the statement.";
    }

    // Close the statement and database connection
    $stmt->close();
    $connect->close();
} else {
    echo "Error: Invalid request.";
}
?>
