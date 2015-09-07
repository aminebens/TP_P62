<?php
require_once '_dbConnect.php';

function add_author($name) {
    global $mysqli;
    $result = false;
    $name = $mysqli->real_escape_string($name);
    $table_genres = TB_GENRES;
    $queryString = "INSERT INTO $table_genres (name) VALUES ($name)";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function get_genres($genre_id = false)
{
    global $mysqli;
    $result = false;
    $table_genres = TB_GENRES;
    $queryString = "SELECT *  FROM $table_genres";
    if (false !== $genre_id) {
        $queryString .= " WHERE genre_id = $genre_id";
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