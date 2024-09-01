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


// Set up query to get booking data
$query = 'SELECT * FROM bookings WHERE task= ? AND person= ?';

// Attempt to run the query

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskID, $userID]);  // Pass in the data
    $booking = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}


    if ($booking == false) {
        // Set up query to insert booking data
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
// Set up query to update task data 
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
}
// tells the user they have already booked this task
else {
 echo '<p>You have already booked this task</p>';
} 

include 'partials/bottom.php'; ?>
