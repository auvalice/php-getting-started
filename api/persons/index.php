<?php
header("Access-Control-Allow-Origin: *");

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    echo "Get got";
}

if ($method == "POST") {
    echo "Post got";
}

if ($method == "DELETE") {
    echo "Delete got";
}
