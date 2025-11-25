<?php
include '../config.php';

$result = $conn->query("SELECT * FROM Events");

while ($row = $result->fetch_assoc()) {
    echo "<a href='candidates.php?event_id=" . $row['event_id'] . "'>" 
        . $row['event_name'] . "</a><br>";
}
?>