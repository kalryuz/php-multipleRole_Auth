<?php

$con = mysqli_connect("localhost", "root", "", "multiple_registeration");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
