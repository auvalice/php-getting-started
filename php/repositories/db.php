<?php

/**
 * Gets a connection object. If it fails, the return result contains the reason
 * for the connection failing to be created.
 * 
 * @return array{
 *     success: boolean,
 *     error: string,
 *     connection: mysqli
 * }
 */
function get_connection(): array
{
    $config = require_once $_SERVER["DOCUMENT_ROOT"] . "/php/config/config.php";

    $connection = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["db"]);
    if (mysqli_connect_errno()) {
        return ["success" => false, "error" => mysqli_connect_error(), "connection" => null];
    }
    return ["success" => true, "error" => "", "connection" => $connection];
}
