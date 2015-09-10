<?php
require_once '_dbConnect.php';

function get_publishers($publisher_id = false)
{
    global $mysqli;
    $result = false;
    $table_publishers = TB_PUBLISHERS;
    $queryString = "SELECT * FROM $table_publishers";
    if (false !== $publisher_id) {
        $queryString .= " WHERE publisher_id = $publisher_id";
    }
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult && ($queryResult->num_rows > 0)) {
        $result = array();
        while ($row = $queryResult->fetch_assoc()) {
            $result[] = $row;
        }
    }
    return $result;
}