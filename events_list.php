<?php
include '../config.php';
$events = $conn->query("SELECT * FROM Events");

while ($e = $events->fetch_assoc()) {
    echo $e['event_name'] . " - <a href='../results/event_results.php?event_id=" . $e['event_id'] . "'>View Results</a><br>";
}
?>