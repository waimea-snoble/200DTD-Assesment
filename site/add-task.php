<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

echo '<h1>Adding task to database</h1>';

consoleLog($_POST, 'Post Data');

//Get form data
$name    = $_POST['name'];
$date = $_POST['date'];
$amount = $_POST['amount'];
$category = $_POST['category'];


if ($category == 'New...') {
    $category = $_POST['new-category'];
}

echo '<p>Name: '    . $name;
echo '<p>Date: ' . $date;
echo '<p>Amount: ' . $amount;
echo '<p>Category: ' . $category;


//Connect to the database
$db = connectToDB();

// Set up query to insert task data
$query = 'INSERT INTO tasks (name, date, amount, category) VALUES (?, ?, ?, ?)';
//Attempt to run the query

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$name, $date, $amount, $category]);
    $tasks = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB Task Add', ERROR);
    die(' There was an error adding task data to the database');
}

// goes to the homepage
header('location: index-admin.php');

include 'partials/bottom.php'; ?>
