<?php
// fetch-reports.php

require("config.php");

$sql = "SELECT * FROM reports INNER JOIN user ON user.email = reports.email ORDER BY dateReported DESC";
$result = $connect->query($sql);

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

        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row['username'] . " <small class='text-muted' style='font-size: 13px'>" . $row['dateReported'] . "</small></h5>";
        echo "<p class='card-text'>" . $row['description'] . "</p>";
        echo "<button class='comment'>";
        echo "<i class='bx bx-comment-detail'></i>";
        echo "<a href='#'> Add A Comment</a>";
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
