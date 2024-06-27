<?php
require 'lib/utils.php';
include 'partials/top.php';
?>

<h2>New Task</h2>

<form method="post" action="add-task.php">


    <label>Name</label>
    <input name="name" type="text" placeholder="e.g. bring 500g chedder cheese" required>

    <label>Date</label>
    <input name="date" type="date" required>

    <label>Category</label>
    <input name="category" type="text" placeholder="e.g. food" required>

    <input type="submit" value="Add">

</form>

<?php
include 'partials/bottom.php';
?>