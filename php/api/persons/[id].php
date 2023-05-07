<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/php/repositories/persons.php";

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    http_response_code(501);
    echo "{ error: 'this API is not implemented!' }";
}
