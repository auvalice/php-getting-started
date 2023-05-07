<?php


require_once $_SERVER["DOCUMENT_ROOT"] . "/php/repositories/db.php";

class PersonsRepository
{

    /**
     * Gets the information of all users.
     * 
     * @param array $fields An array of fieldnames containing the fields 
     * that should be returned to the user.
     */
    static function get_all(array $fields): array | string
    {
        $connection_object = get_connection();

        if (!$connection_object['success']) {
            return $connection_object['error'];
        }
        $conn = $connection_object['connection'];

        $sql_result = $conn->execute_query("SELECT * FROM insurance_details;");
        $db_fields = $sql_result->fetch_fields();
        $count = sizeof($db_fields);

        $result = [];

        $rows = mysqli_fetch_all($sql_result, MYSQLI_NUM);

        foreach ($rows as $row) {
            $object = new stdClass();
            for ($i = 0; $i < $count; $i++) {
                $field_name = $db_fields[$i]->name;
                if (in_array($field_name, $fields)) {
                    $value = $row[$i];
                    $object->{$field_name} = $value;
                }
            }
            $result[] = $object;
        }
        $conn->close();
        return $result;
    }


    /**
     * Gets the user information by the given ID.
     * 
     * @param int $id The ID of the user
     * @param array $fields An array of fieldnames containing the fields 
     * that should be returned to the user.
     * @return stdClass|string A stdClass object containing the user data, or the 
     * connection error string if an error occurred.
     */
    static function get_by_id(int $id, array $fields): stdClass | string
    {
        $connection_object = get_connection();

        if (!$connection_object['success']) {
            return $connection_object['error'];
        }
        $conn = $connection_object['connection'];

        $sql_result = $conn->execute_query("SELECT * FROM insurance_details WHERE ID = ?;", [$id]);
        $db_fields = $sql_result->fetch_fields();
        $count = sizeof($db_fields);

        $result = [];

        $rows = mysqli_fetch_all($sql_result, MYSQLI_NUM);

        foreach ($rows as $row) {
            $object = new stdClass();
            for ($i = 0; $i < $count; $i++) {
                $field_name = $db_fields[$i]->name;
                if (in_array($field_name, $fields)) {
                    $value = $row[$i];
                    $object->{$field_name} = $value;
                }
            }
            $result[] = $object;
        }
        $conn->close();
        return $result;
    }
}
