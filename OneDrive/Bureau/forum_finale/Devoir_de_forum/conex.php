<?php

$conex = mysqli_connect('localhost', 'root', '', 'db_tp', '3306');

if (mysqli_connect_error()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }
  mysqli_set_charset($conex,"utf8");

?>