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

echo '<ul id="task-list">';

foreach($tasks as $task) {
    echo '<li>';

    echo   '<a href="book-task-form.php?id=' . $task['id'] . '">';
    echo     $task['name'];
    echo   '</a>';
    echo ($task['date']);
    echo '</li>';
}

echo '</ul>';

include 'partials/bottom.php'; ?>