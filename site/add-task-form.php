<?php
require 'lib/utils.php';
include 'partials/top-admin.php';

//Connect to the database
$db = connectToDB();
 
consolelog($db);
        // Set up query to get task data
$query = 'SELECT DISTINCT category FROM tasks ORDER BY category ASC';
// Attempt to run the query
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
    const newCatInput = document.getElementById('new-category-input');
    if (catSelect.value=='New...') {
        newCat.style.display = 'block';
        newCatInput.required = true;
    }
    else {
        newCat.style.display = 'none';
        newCatInput.required = false;
    }
}
</script>

<h2>New Task</h2>

<!-- form for adding a task -->
<form method="post" action="add-task.php">


    <label>Name</label>
    <input name="name" type="text" placeholder="e.g. large bag of nachos" required>

    <label>Date</label>
    <input name="date" type="date" required>

    <label>Amount</label>
    <input name="amount" type="number" required>

    <label>Category</label>
    <select name="category" id="category" onClick="openNew();" style="color:black">

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
        <input id="new-category-input" name="new-category" type="text" placeholder="e.g. food" style="color:black">

    </div>

    <input type="submit" value="Add" >
    <!-- back button -->
    <input type="button" value="back" onclick="history.back()"> 

 
</form>

<?php
include 'partials/bottom.php';
?>