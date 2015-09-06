<?php
require_once '_dbConnect.php';

function add_category($name) {
    global $mysqli;
    $result = false;
    $name = $mysqli->real_escape_string($name);
    $table_categories = TB_CATEGORIES;
    $queryString = "INSERT INTO $table_categories (name) VALUES ($name)";
    //var_dump($queryString);
    $res = $mysqli->query($queryString);
    if ($res) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function get_categories($category_id = false)
{
    global $mysqli;
    $result = false;
    $table_categories = TB_CATEGORIES;
    $queryString = "SELECT name FROM $table_categories";
    if (false !== $category_id) {
        $queryString .= " WHERE category_id = $category_id";
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