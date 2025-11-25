<?php
session_start();
include '../config.php';

$events = $conn->query("SELECT * FROM Events");

if (isset($_POST['add'])) {

    $event_id = $_POST['event_id'];
    $name = $_POST['name'];
    $bio = $_POST['bio'];
    $photo = $_POST['photo'];

    $sql = "INSERT INTO Candidates (event_id, name, bio, photo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $event_id, $name, $bio, $photo);

    if ($stmt->execute()) {
        echo "Candidate added!";
    } else {
        echo "Error!";
    }
}
?>
<form method="POST">
    <select name="event_id">
        <?php while ($e = $events->fetch_assoc()): ?>
            <option value="<?= $e['event_id'] ?>"><?= $e['event_name'] ?></option>
        <?php endwhile; ?>
    </select>
    <input type="text" name="name" placeholder="Candidate Name" required>
    <textarea name="bio" placeholder="Biography"></textarea>
    <input type="text" name="photo" placeholder="Photo Path">
    <button name="add">Add Candidate</button>
</form>
