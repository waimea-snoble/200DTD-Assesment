<?php
require 'lib/utils.php';
include 'partials/top.php';

consoleLog($_GET);

$taskId = $_GET['task'] ?? null;
if (!$taskId) die("Missing task ID!");

$db = connectToDB();

$query = 'SELECT name FROM tasks WHERE id = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskId]);
    $task = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Task Fetch', ERROR);
    die('There was an error getting task data from the database');
}

echo '<h2>Sign Up: ' . $task['name'] . '</h2>';
?>

<form method="post" action="check-email.php">

    <input name="taskID" type="hidden" value="<?= $taskId ?>">

    <label>Email</label>
    <input name="email" type="email" placeholder="e.g. 123@gmail.com" required>

    <input type="submit" value="Submit">
    <input type="button" value="back" onclick="history.back()" style="color:white"/> 

    
</form>



<?php
echo '</ul>';

include 'partials/bottom.php';
?>