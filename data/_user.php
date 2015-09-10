<?php

require_once('_dbConnect.php');

// Encrypte le mot de pass avec sha1 (40 octets)
function encrypt_sha1($pass) {
    $encrypted_pass = sha1($pass);
    return $encrypted_pass;
}

// Authentifie l'utilisateur
function authenticate_user($email, $pass) {
    global $mysqli;
    $result = false;

    $email = $mysqli->real_escape_string($email);
    $pass = $mysqli->real_escape_string($pass);

    $pass = encrypt_sha1($pass);

    $table_users = TB_USERS;

    $queryString = "SELECT * FROM $table_users WHERE email = '$email' AND pass = '$pass'";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);

    if ($queryResult && $queryResult->num_rows > 0) {
        $result = $queryResult->fetch_assoc();
    }

    return $result;
}

function add_user($address_id, $first_name, $last_name, $email, $pass){
    global $mysqli;
    $result = false;

    $address_id = $mysqli->real_escape_string($address_id);
    $first_name = $mysqli->real_escape_string($first_name);
    $last_name = $mysqli->real_escape_string($last_name);
    $email = $mysqli->real_escape_string($email);
    $pass = $mysqli->real_escape_string($pass);


    $table_users = TB_USERS;
    $pass = encrypt_sha1($pass);
    $queryString = "INSERT INTO $table_users ".
        "(address_id, first_name, last_name, email, pass)".
        " VALUES ($address_id, '$first_name', '$last_name', '$email', '$pass')";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;

}