<?php
require '_config.php';
require 'lib/utils.php';
include 'partials/top.php';
?>

<!-- admin login form -->
<h2>Admin Login</h2>

<form method="post" action="admin-login.php">

    <label>Username</label>
    <input name="username" type="text" placeholder="e.g. Username" required>

    <label>Password</label>
    <input name="password" type="password" placeholder="e.g. password" required>

    <input type="submit" value="Login">
    <input type="button" value="back" onclick="history.back()" style="color:white"> 
</form>

<?php



include 'partials/bottom.php';
?>