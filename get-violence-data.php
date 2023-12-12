<?php
require "config.php";

$sql = "SELECT violenceType, COUNT(*) AS cases FROM reports GROUP BY violenceType";
$result = $connect->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array($row['violenceType'], (int)$row['cases']);
    }
}

echo json_encode($data);

$connect->close();
?>
