<?php
require '_config.php';
require 'lib/utils.php';
include 'partials/top.php';


echo '<h1>Signing in</h1>';


consoleLog($_POST, 'Post Data');

// Get form data
$username = $_POST['username'];
$password = $_POST['password'];

echo '<p>Username: '    . $username;
echo '<p>Password: ' . $password;

//Connect to database
$db = connectToDB();

//Setup a query to select admin data
$query = 'SELECT * FROM `admin` ';

//Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $admin = $stmt->fetch();
}

catch (PDOException $e) {
    consoleLog($e->getMessage(),'DB List Fetch', ERROR);
    die('There was an error selecting data from the database.');
}


if ($username == $admin['username'] && $password == $admin['password']) {
    header('location: index-admin.php');
}

else {
    echo '<br>';
    echo ' Incorrect Username or Password. ';
}



include 'partials/bottom.php';
?>