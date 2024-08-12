<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

echo '<h2>Names</h2>';
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

echo '<ul id="name-list">';

echo '<table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>';

foreach($tasks as $task) {
    echo '<tr>';
    echo '<td>' . $task['pname'] . '</td>';
    echo '<td>' . $task['pemail'] . '</td>';
    echo '<td>' . $task['pphone'] . '</td>';

    echo '</tr>';
}

echo '</table>';

echo '</ul>';

echo '<div id="add-button">
        <a href="add-task-form.php">
            Add
        </a>
    </div>';

include 'partials/bottom.php'; ?>