<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "academic_route";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("Failed to connect!");
}

