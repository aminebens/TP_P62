<?php
require_once '_dbConnect.php';
/*
function add_comic($name) {
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
}*/

function get_comics($comic_id = false)
{
    global $mysqli;
    $result = false;
    $table_comics = TB_COMICS;
    $queryString = "SELECT * FROM $table_comics";
    if (false !== $comic_id) {
        $queryString .= " WHERE category_id = $comic_id";
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