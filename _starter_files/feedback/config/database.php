<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'Lucas');
define('DB_PASS', 'qwer');
define('DB_NAME', 'php_dev');

// create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn -> connect_errno){
    die('Connection failed ' . $conn -> connect_errno);
}

?>