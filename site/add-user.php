<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h1>Adding booking to database</h1>';

consoleLog($_POST, 'Post Data');

//Get form data
$taskID = $_POST['taskID'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

echo '<p>Name: '    . $name;
echo '<p>Phone: ' . $phone;
echo '<p>Email: ' . $email;

//Connect to the database
$db = connectToDB();


$query = 'INSERT INTO people (name, phone, email) VALUES (?, ?, ?)';
//Attempt to run the query

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $phone, $email]);
    $personID = $db->lastInsertId();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Person Add', ERROR);
    die(' There was an error adding person data to the database');
}

consoleLog("Task ID: " . $taskID);
consoleLog("Person ID: " . $personID);

header('location: add-booking.php?task=' . $taskID . '&user=' . $personID );