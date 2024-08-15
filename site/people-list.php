<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

echo '<h2>Volunteers</h2>';
?>

<?php
consoleLog($_GET, 'Get Data');

$taskID = $_GET['id'] ?? null;
if($taskID == null) die('Invalid task ID');

//Connect to the database
$db = connectToDB();


$query = 'SELECT people.name     AS pname,
                 people.email    AS pemail,
                 people.phone    AS pphone

            FROM bookings 
            JOIN people ON bookings.person = people.id
            WHERE bookings.task = ?';

try {
    $stmt = $db->prepare($query);
    $stmt->execute([$taskID]);
    $tasks = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

// See what we got back
consoleLog($tasks);



echo '<ul id="people-list">';

foreach($tasks as $task) {


    echo '<li>';

    echo '<span class="label">Name:</span> ' . $task['pname'];
    echo     '<br>';
    echo '<span class="label">Email:</span> ' . $task['pemail'];
    echo     '<br>';
    echo '<span class="label">Phone:</span> ' . $task['pphone'];
    echo '</li>';
}

echo '</ul>';

echo '<div id="back-button">
        <a href="javascript:history.back()">
            Back
        </a>
    </div>';

include 'partials/bottom.php'; ?>