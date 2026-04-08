<?php

$connect = mysqli_connect(
    "sql206.infinityfree.com",   // your host
    "if0_41575875",              // your DB username
    "Prasad@2004",             // your DB password
    "if0_41575875_hms"           // your DB name
);

if (!$connect) {
    die("Database connection failed: " . mysqli_connect_error());
}

?>