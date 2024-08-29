<?php
require 'lib/utils.php';
include 'partials/top-admin.php';
?>


<div id="admin">
<a href="index.php" class="<?= $page=='index.php' ? 'active' : '' ?>">Logout</a>
</div>


<?php
echo '<h2>Categories</h2>';

$db = connectToDB();
consoleLog($db);
// Setup a query to get task data
$query = 'SELECT DISTINCT category FROM tasks';

// Attempt to run the query
try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $tasks = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error getting service data from the database');
}

// See what we got back
consoleLog($tasks);

// task category list
echo '<ul id="category-list">';

foreach($tasks as $task) {
    echo '<li>';

    echo   '<a href="admin-task-list.php?cat=' . urlencode($task['category']) . '">';
    echo     $task['category'];
    echo   '</a>';
    echo '</li>';
}

echo '</ul>';

// add button
echo '<div id="add-button">
        <a href="add-task-form.php">
            Add
        </a>
    </div>';

include 'partials/bottom.php'; ?>