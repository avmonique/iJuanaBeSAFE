<?php
require "config.php";

$sql = "SELECT IFNULL(violenceType, 'No Type') AS type, IFNULL(violence, 'No Violence') AS violence, COUNT(*) AS cases FROM reports WHERE (violence IS NOT NULL AND violence <> '') OR (violenceType IS NOT NULL AND violenceType <> '') GROUP BY violenceType, violence";
$result = $connect->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array($row['type'] . $row['violence'], (int)$row['cases']);
    }
}

echo json_encode($data);

$connect->close();
?>
