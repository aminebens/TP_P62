<?php
require_once '_dbConnect.php';

function add_publisher($name) {
    global $mysqli;
    $result = false;
    $name = $mysqli->real_escape_string($name);
    $table_publishers = TB_PUBLISHERS;
    $queryString = "INSERT INTO $table_publishers (name) VALUES ('$name')";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function update_publisher($publisher_id, $name) {
    global $mysqli;
    $result = false;
    $publisher_id = $mysqli->real_escape_string($publisher_id);
    $name = $mysqli->real_escape_string($name);
    $table_publishers = TB_PUBLISHERS;
    $queryString = "UPDATE $table_publishers SET name='$name' WHERE publisher_id=$publisher_id";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function delete_publisher($publisher_id) {
    global $mysqli;
    $result = false;
    $table_publishers = TB_PUBLISHERS;
    $queryString = "DELETE FROM $table_publishers WHERE publisher_id=$publisher_id";
    var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

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