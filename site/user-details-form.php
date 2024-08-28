<?php
require 'lib/utils.php';
include 'partials/top.php';

consoleLog($_GET);

$taskId = $_GET['task'] ?? null;
if (!$taskId) die("Missing task ID!");

$db = connectToDB();
// Setup a query to get task data
$query = 'SELECT name FROM tasks WHERE id = ?';

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskId]);
    $task = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Task Fetch', ERROR);
    die('There was an error getting task data from the database');
}

// user details form
echo '<h2>Sign Up: ' . $task['name'] . '</h2>';

echo '<p>Your details are not in our database, so please enter them below...';
?>

<form method="post" action="add-user.php">

    <input name="taskID" type="hidden" value="<?= $taskId ?>">

    <label>Full Name</label>
    <input name="name" type="text" placeholder="e.g. Dave Smith" required>

    <label>Phone</label>
    <input name="phone" type="text" placeholder="e.g. 123456789" required>

    <label>Email</label>
    <input name="email" type="email" placeholder="e.g. 123@gmail.com" required>

    <input type="submit" value="Submit">
    <input type="button" value="back" onclick="history.back()" style="color:white"> 
    
</form>

<?php


include 'partials/bottom.php';
?>