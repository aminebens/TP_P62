<?php

require_once('_dbConnect.php');

function add_user($address_id, $first_name, $last_name, $email, $pass, $phone, $gender, $secret_question,
                  $secret_answer, $date_of_birth, $registration_date, $usertype){
    global $mysqli;
    $result = false;

    $address_id = $mysqli->real_escape_string($address_id);
    $first_name = $mysqli->real_escape_string($first_name);
    $last_name = $mysqli->real_escape_string($last_name);
    $email = $mysqli->real_escape_string($email);
    $pass = $mysqli->real_escape_string($pass);
    $phone = $mysqli->real_escape_string($phone);
    $gender = $mysqli->real_escape_string($gender);
    $secret_question = $mysqli->real_escape_string($secret_question);
    $secret_answer = $mysqli->real_escape_string($secret_answer);
    $date_of_birth = $mysqli->real_escape_string($date_of_birth);
    $registration_date = $mysqli->real_escape_string($registration_date);
    $usertype = $mysqli->real_escape_string($usertype);

    $table_users = TB_USERS;
    $queryString = "INSERT INTO $table_users ".
        "(address_id, first_name, last_name, email, pass, phone, gender, secret_question, secret_answer, date_of_birth, registration_date, usertype)".
        " VALUES ($address_id, $first_name, $last_name, $email, $pass, $phone, $gender, $secret_question, $secret_answer, $date_of_birth, $registration_date, $usertype)";
    //var_dump($queryString);
    $queryResult = $mysqli->query($queryString);
    if ($queryResult) {
        $result = $mysqli->insert_id;
    }
    return $result;

}