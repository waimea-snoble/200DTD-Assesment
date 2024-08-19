<?php
require 'lib/utils.php';

consoleLog($_POST);

$taskId = $_POST['taskID'] ?? null;
$email = $_POST['email'] ?? null;


$db = connectToDB();
//Setup a query to select people data 
$query = 'SELECT id FROM people WHERE email = ?';
//Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);
    $user = $stmt->fetch();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB User Fetch', ERROR);
    die('There was an error getting user data from the database');
}



if (!$user) {
    // No user exists with that email, so get their details
    header('location: user-details-form.php?task=' . $taskId);
}
else {

    

    // User exists, so confirm booking
    header('location: add-booking.php?task=' . $taskId . '&user=' . $user['id'] );

}

