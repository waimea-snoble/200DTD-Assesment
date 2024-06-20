<?php
require 'lib/utils.php';
include 'partials/top.php';

consoleLog($_GET);

$taskId = $_GET['id'] ?? null;
if (!$taskId) die("Missing task ID!");

?>

<h2>Make Booking</h2>

<form method="post" action="add-booking.php">

    <input name="taskID" type="hidden" value="<?= $taskId ?>">

    <label>Full Name</label>
    <input name="name" type="text" placeholder="e.g. Dave" required>

    <label>Phone</label>
    <input name="phone" type="text" placeholder="e.g. 123456789" required>

    <label>Email</label>
    <input name="email" type="text" placeholder="e.g. 123@gmail.com" required>

    <input type="submit" value="Submit">
</form>

<?php
include 'partials/bottom.php';
?>