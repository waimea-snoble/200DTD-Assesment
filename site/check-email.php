<?php
require 'lib/utils.php';

consoleLog($_POST);

$taskId = $_POST['taskID'] ?? null;
$email = $_POST['email'] ?? null;


$db = connectToDB();

$query = 'SELECT id FROM people WHERE email = ?';

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
    $query = 'UPDATE tasks SET amount = amount-1 WHERE id= ?';
    
    // Attempt to run the query
    try {
        $stmt = $db->prepare($query);
        $stmt->execute([$taskId]);  //Pass in the data
    }
    catch (PDOException $e) {
        consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
        die('There was an error updating task data from the database');
    }
    

    // User exists, so confirm booking
    header('location: add-booking.php?task=' . $taskId . '&user=' . $user['id'] );

}

