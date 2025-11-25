<?php
include '../config.php';

$student_id = "STUDENT123"; 
$event_id = $_GET['event_id'];
$candidate_id = $_GET['candidate_id'];

$sql = "SELECT * FROM Votes WHERE student_id=? AND event_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $student_id, $event_id);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    die("You already voted for this event!");
}

$sql = "INSERT INTO Votes (student_id, candidate_id, event_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sii", $student_id, $candidate_id, $event_id);
$stmt->execute();

echo "Vote submitted!";
?>