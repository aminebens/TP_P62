<?php
require_once '_dbConnect.php';

function add_author($writer, $artist) {
    global $mysqli;
    $result = false;
    $writer = $mysqli->real_escape_string($writer);
    $artist = $mysqli->real_escape_string($artist);
    $table_authors = TB_AUTHORS;
    $queryString = "INSERT INTO $table_authors (Writer, Artist) VALUES ($writer, $artist)";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function get_authors($author_id = false)
{
    global $mysqli;
    $result = false;
    $table_authors = TB_AUTHORS;
    $queryString = "SELECT Writer, Artist  FROM $table_authors";
    if (false !== $author_id) {
        $queryString .= " WHERE author_id = $author_id";
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