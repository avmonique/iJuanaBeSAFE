<?php
require "config.php";

$sql = "SELECT u.campus, COUNT(*) AS cases 
        FROM reports r
        INNER JOIN user u ON r.email = u.email
        GROUP BY u.campus";
$result = $connect->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array($row['campus'], (int)$row['cases']);
    }
}

echo json_encode($data);

$connect->close();
?>
