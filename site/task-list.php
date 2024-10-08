<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h2>Tasks</h2>';


$cat = $_GET['cat'] ?? null;

$db = connectToDB();
consoleLog($db);
// Setup a query to get tasks that belong to a specific category
$query = 'SELECT * FROM tasks WHERE category = ?';

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute([$cat]);
    $tasks = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}



// See what we got back
consoleLog($tasks);

// task list
    $displayedTasks = 0;

    if (empty($tasks)) {
        echo '<p>No tasks available in this category.</p>';
    } else {
        echo '<ul id="task-list">';
        
        foreach ($tasks as $task) {
            // Create a date object from DB date
            $date = new DateTimeImmutable($task['date']);
            // And format it
            $dateText = $date->format('d M Y');

            if ($task['amount'] > 0) {
                echo '<li>';
                echo   '<a href="email-form.php?task=' . $task['id'] . '">';
                echo     $task['name'] . ": " . $dateText;
                echo   '</a>';
                echo '<b>';
                echo 'x ' . $task['amount'];
                echo '</b>';
                echo '</li>';
                $displayedTasks++;
            }
        }
        
        // message if there are no tasks available
        if ($displayedTasks === 0) {
            echo '<p>There are no tasks in this category</p>';
        }
    }


echo '</ul>';

// back button
echo '<div id="back-button">
        <a href="javascript:history.back()">
            Back
        </a>
    </div>';
include 'partials/bottom.php'; ?>