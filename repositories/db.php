<?php

function get_connection(): mysqli
{
    $config = require_once($_SERVER["DOCUMENT_ROOT"] . "/config/config.php");

    $connection = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["db"]);
    if (mysqli_connect_errno()) {
        echo "Could not connect to MySQL: " . mysqli_connect_error();
        exit();
    }
    return $connection;
}
