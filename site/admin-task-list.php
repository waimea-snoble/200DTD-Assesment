<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

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

echo '<ul id="admin-task-list">';

foreach($tasks as $task) {
    echo '<li>';

    echo   '<a href="people-list.php?id=' . $task['id'] . '">';
    echo     $task['name'] . ":" . " ";
    echo ($task['date']);
    echo   '</a>';


    echo '<a href="delete-task.php?id=' . $task['id'] . '"
    onclick="return confirm(`Are you sure you want to delete this task?`);">🗑</a>';

    echo '</li>';
}

echo '</ul>';

echo '<div id="add-button">
        <a href="add-task-form.php">
            Add
        </a>
    </div>';

    echo '<div id="back-button">
    <a href="javascript:history.back()">
        Back
    </a>
    </div>';

include 'partials/bottom.php'; ?>