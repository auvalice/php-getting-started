<table>

    <?php

    require_once $_SERVER["DOCUMENT_ROOT"] . "/repositories/db.php";

    $conn = get_connection();

    $result = $conn->execute_query("SELECT * FROM insurance_details WHERE ID = ?;", [$id]);

    $fields = $result->fetch_fields();

    echo "<thead><tr>";

    foreach ($fields as $field) {
        echo "<th>" . $field->name . "</th>";
    }

    echo "</tr></thead>";
    echo "<tbody>";

    while ($row = $result->fetch_row()) {
        echo "<tr>";
        foreach ($row as $row_value) {
            echo "<td>" . $row_value . "</td>";
        }
        echo "</tr>";
    }

    echo "</tbody>";
    $conn->close();
    ?>

</table>