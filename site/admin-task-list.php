<?php
require '_functions.php';
include 'partials/top.php';

echo '<h1>Hello World!</h1>';



$db = connectToDB();
consoleLog($db);

$query = 'SELECT users.name      AS uname,
                 tasks.name      AS tname,
                 
            FROM games
            JOIN companies ON games.company = companies.code

            ORDER BY games.name ASC';