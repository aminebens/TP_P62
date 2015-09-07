<?php
require_once '_dbConnect.php';

function add_comic($publisher_id, $author_id, $category_id, $title, $description,
                   $isbn, $rating, $price, $cover_img_path, $preview_img_path, $publishing_date) {
    global $mysqli;
    $result = false;

    $publisher_id = $mysqli->real_escape_string($publisher_id);
    $author_id = $mysqli->real_escape_string($author_id);
    $category_id = $mysqli->real_escape_string($category_id);
    $title = $mysqli->real_escape_string($title);
    $description = $mysqli->real_escape_string($description);
    $isbn = $mysqli->real_escape_string($isbn);
    $rating = $mysqli->real_escape_string($rating);
    $price = $mysqli->real_escape_string($price);
    $cover_img_path = $mysqli->real_escape_string($cover_img_path);
    $preview_img_path = $mysqli->real_escape_string($preview_img_path);
    $publishing_date = $mysqli->real_escape_string($publishing_date);

    $table_comics = TB_COMICS;
    $queryString = "INSERT INTO $table_comics ".
        "(publisher_id, author_id, category_id, title, description, isbn, rating, price, cover_img_path, preview_img_path, publishing_date)".
        " VALUES ($publisher_id, $author_id, $category_id, $title, $description, $isbn, $rating, $price, $cover_img_path, $preview_img_path, $publishing_date)";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}

function get_comics($category_id = false)
{
    global $mysqli;
    $result = false;
    $table_comics = TB_COMICS;
    $queryString = "SELECT * FROM $table_comics";
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

function get_item_details($item_id) {
    global $mysqli;
    $result = false;
    $table_comics = TB_COMICS;
    $queryString = "SELECT * FROM $table_comics WHERE comic_id = $item_id";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $queryResult->fetch_assoc();
    }
    return $result;
}

function search_comics($term) {
    global $mysqli;
    $result = false;
    $table_comics = TB_COMICS;
    $queryString = "SELECT * FROM $table_comics WHERE title LIKE '%$term%' OR description LIKE '%$term%'";
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