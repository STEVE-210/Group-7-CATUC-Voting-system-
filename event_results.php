<?php
include '../config.php';

$event_id = $_GET['event_id'];

$sql = "
SELECT Candidates.name, COUNT(Votes.vote_id) AS total_votes
FROM Candidates
LEFT JOIN Votes ON Candidates.candidate_id = Votes.candidate_id
WHERE Candidates.event_id = ?
GROUP BY Candidates.candidate_id
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $event_id);
$stmt->execute();
$res = $stmt->get_result();

while ($row = $res->fetch_assoc()) {
    echo $row['name'] . " - Votes: " . $row['total_votes'] . "<br>";
}
?>