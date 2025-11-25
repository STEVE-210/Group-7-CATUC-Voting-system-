<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
?>
<h2>Admin Dashboard</h2>
<a href="create_event.php">Create Event</a><br>
<a href="create_candidate.php">Add Candidates</a><br>
<a href="events_list.php">All Events</a><br>
<a href="candidates_list.php">All Candidates</a><br>
<a href="logout.php">Logout</a>
