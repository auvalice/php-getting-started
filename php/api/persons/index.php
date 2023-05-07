<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/php/repositories/persons.php";

header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    $query_params = $_GET["fields"];
    $field_names = explode(",", $query_params);
    $data = PersonsRepository::get_all($field_names);

    print_r(json_encode($data));
}

if ($method == "POST") {
    http_response_code(501);
    echo "{ error: 'POST is not implemented!' }";
}
