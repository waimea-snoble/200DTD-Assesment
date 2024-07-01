<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Finding user in the database</h1>';

consoleLog($_POST, 'Post Data');

//Get form data
$taskId = $_POST['taskID'];
$email = $_POST['email'];


echo '<p>Email: ' . $email;

//Connect to the database
$db = connectToDB();


$query = 'SELECT * FROM people WHERE email = ?';
//Attempt to run the query

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$email]);
    $personID = $db->lastInsertId();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Person Add', ERROR);
    die(' There was an error adding person data to the database');
}
