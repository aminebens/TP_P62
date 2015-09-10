<?php
require_once ' _dbConnect.php';

function add_address($street_num, $street, $city, $province, $postal_code) {
    global $mysqli;
    $result = false;

    $street_num = $mysqli->real_escape_string($street_num);
    $street = $mysqli->real_escape_string($street);
    $city = $mysqli->real_escape_string($city);
    $province = $mysqli->real_escape_string($province);
    $postal_code = $mysqli->real_escape_string($postal_code);


    $table_addresses = TB_ADDRESSES;
    $queryString = "INSERT INTO $table_addresses ".
        "(street_num, street, city, province, postal_code)".
        " VALUES ($street_num, $street, $city, $province, $postal_code)";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;
}