<?php
$conn = new mysqli('localhost', 'root', '', 'wrts');
global $conn;
session_start();

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>