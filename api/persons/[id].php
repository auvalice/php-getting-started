<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/repositories/db.php";

$conn = get_connection();

$sql_result = $conn->execute_query("SELECT * FROM insurance_details WHERE ID = ?;", [$id]);
$fields = $sql_result->fetch_fields();
$count = sizeof($fields);

$result = new stdClass();

while ($row = $sql_result->fetch_row()) {
    for ($i = 0; $i < $count; $i++) {
        $result->{$fields[$i]->name} = $row[$i];
    }
}

echo json_encode($result);

$conn->close();
