<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

$db = connectToDB();
 
consolelog($db);

$query = 'SELECT DISTINCT category FROM tasks ORDER BY category ASC';

try {
    $stmt = $db->prepare($query);
    $stmt->execute();
    $tasks = $stmt->fetchAll();
}
catch (PDOException $e) {
    consoleLog($e->getmessage(), 'DB List Fetch', ERROR);
    die('There was an error getting data from the database');
}
?>

<script>
function openNew() {
    const catSelect = document.getElementById('category');
    const newCat = document.getElementById('new-category');

    if (catSelect.value=='New...') {
        newCat.style.display = 'block';
    }
    else {
        newCat.style.display = 'none';
    }
}
</script>

<h2>New Task</h2>

<form method="post" action="add-task.php">


    <label>Name</label>
    <input name="name" type="text" placeholder="e.g. bring 500g chedder cheese" required>

    <label>Date</label>
    <input name="date" type="date" required>

    <label>Category</label>
    <select name="category" required id="category" onChange="openNew();">

<?php
    foreach($tasks as $task) {
        echo '<option>';
        echo     $task['category'];  
        echo '</option>';
    }
?>
        <option>New...</option>
    </select>

    <div id="new-category" style="display: none;">
        <label>New Category</label>
        <input name="newcategory" type="text" placeholder="e.g. food">
    </div>

    <input type="submit" value="Add">

 
</form>

<?php
include 'partials/bottom.php';
?>