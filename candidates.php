<?php
include '../config.php';

$event_id = $_GET['event_id'];

$result = $conn->query("SELECT * FROM Candidates WHERE event_id=$event_id");

while ($c = $result->fetch_assoc()) {
    echo "<p>";
    echo "<b>".$c['name']."</b><br>";
    echo $c['bio']."<br>";
    echo "<a href='vote.php?candidate_id=".$c['candidate_id']."&event_id=".$event_id."'>Vote</a>";
    echo "</p>";
}
?>