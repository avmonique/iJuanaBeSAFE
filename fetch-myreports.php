<?php
session_start();
require("config.php");
                        $email = $_SESSION['email'];
                
                        $sql = "SELECT * FROM reports WHERE email = '$email' ORDER BY dateReported DESC";

                $result = $connect->query($sql);
                // echo "<h2 class='fs-3 ps-3 pt-2 text-uppercase'> My Reports</h2>"; 

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card">';
                        echo "<div class='card mb-3 mx-3'>";
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
                        echo "<h5 class='card-title'>"." <small class='text-muted fs-6'>" . $row['dateReported'] . "</small></h5>";
                        echo "<p class='card-text'>" . $row['description'] . "</p>";
                        echo "<button class='comment'>";
                        echo "<i class='bx bx-left-top-arrow-circle'></i>";
                        echo "<a href='add-comment.php?reportID=" . $row['reportID'] . "'> View Report</a>";
                        echo "</button>";
                        echo "</div>";
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