<?php
include '../config.php';
$candidates = $conn->query("SELECT * FROM Candidates");

while ($c = $candidates->fetch_assoc()) {
    echo $c['name'] . " (Event " . $c['event_id'] . ")<br>";
}
?>