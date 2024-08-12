<?php
require 'lib/utils.php';
include 'partials/top.php';

echo '<h2>Tasks</h2>';


$cat = $_GET['cat'] ?? null;

$db = connectToDB();
consoleLog($db);

$query = 'SELECT * FROM tasks WHERE category = ?';

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

echo '<ul id="task-list" >';


    foreach($tasks as $task) {

        if ($task['amount'] > 0) {
        echo '<li>';
    
        echo   '<a href="email-form.php?task=' . $task['id'] . '">';
        echo     $task['name'] . ":" . " ";
        echo     ($task['date']);
        echo   '</a>';
        echo '<b>';
        echo 'x' . " " . ($task['amount']);
        echo '</b>';
        echo '</li>';
        }

    }

    // $displayedTasks = 0;

    // if (empty($tasks)) {
    //     echo '<p>No tasks available in this category.</p>';
    // } else {
    //     echo '<ul id="task-list">';
        
    //     foreach ($tasks as $task) {
    //         if ($task['amount'] > 0) {
    //             echo '<li>';
    //             echo   '<a href="email-form.php?task=' . $task['id'] . '">';
    //             echo     $task['name'] . ": " . $task['date'];
    //             echo   '</a>';
    //             echo '<b>';
    //             echo 'x ' . $task['amount'];
    //             echo '</b>';
    //             echo '</li>';
    //             $displayedTasks++;
    //         }
    //     }
        
    //     echo '</ul>';
        
    //     if ($displayedTasks === 0) {
    //         echo '<p>There are tasks in this category, but none are currently available to display.</p>';
    //     }
    // }


echo '</ul>';

echo '<div id="back-button">
        <a href="javascript:history.back()">
            Back
        </a>
    </div>';
include 'partials/bottom.php'; ?>