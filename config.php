<?php
define('USER', 'root');
define('PASSWORD', 'letsrock@');
define('HOST', 'localhost');
define('DATABASE', 'mydb');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>