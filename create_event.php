<?php
session_start();
include '../config.php';

if (isset($_POST['create'])) {

    $name = $_POST['name'];
    $desc = $_POST['description'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $sql = "INSERT INTO Events (event_name, event_description, voting_start_date, voting_end_date)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $desc, $start, $end);

    if ($stmt->execute()) {
        echo "Event created!";
    } else {
        echo "Error!";
    }
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Event Name" required>
    <textarea name="description" placeholder="Description"></textarea>
    <label>Voting Start</label>
    <input type="datetime-local" name="start" required>
    <label>Voting End</label>
    <input type="datetime-local" name="end" required>
    <button name="create">Create Event</button>
</form>
