<?php
require '_config.php';
require 'lib/utils.php';
include 'partials/top.php';
?>

<h2>Admin Login</h2>

<form method="post" action="admin-login.php">

    <label>Name</label>
    <input name="username" type="text" placeholder="e.g. Happygames" required>

    <label>Password</label>
    <input name="password" type="password" placeholder="e.g. password" required>

    <input type="submit" value="Login">

</form>

<?php
include 'partials/bottom.php';
?>