<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Adding booking to database</h1>';

consoleLog($_GET, 'Get Data');

//Get form data
$taskID = $_GET['task'] ?? null;
$userID = $_GET['user'] ?? null;

//Connect to the database
$db = connectToDB();

$query = 'UPDATE tasks SET amount = amount-1 WHERE id= ?';
    
// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskID]);  // Pass in the data
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error updating task data from the database');
}

$query = 'INSERT INTO bookings (task, person) VALUES (?, ?)';
//Attempt to run the query

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskID, $userID]);
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Booking Add', ERROR);
    die(' There was an error adding booking data to the database');
}



echo '<p>Thank you for signing up.</p>';
// header('location: index.php');

include 'partials/bottom.php'; ?>
