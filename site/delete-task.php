<?php
require 'lib/utils.php';
include 'partials/top.php';

$taskId = $_GET['id'] ?? '';


// Connect to the database
$db = connectToDB();

// Setup a query to delete tasks
$query = 'DELETE FROM tasks WHERE id= ?';


// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskId]);  //Pass in the data
}



catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error deleting task data from the database');
}
// goes to homepage
header('location: index-admin.php');
