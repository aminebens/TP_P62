<?php

// TODO : renforcer plus le form ac reg exp et pousser le nouvel user ds la BDD
define('SUBMIT', 'submit');
define('ERR_MSG', 'err_msg');
define('VAL_MSG', 'val_msg');
define('VALUE', 'value');
define('IS_VALID', 'is_valid');


$validation_signup = array(
    FIRST_NAME => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    LAST_NAME => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    EMAIL => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    PASS => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    PASS_CONFIRM => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    STREET_NUM => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    STREET => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    CITY => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    PROVINCE => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    ZIP => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
    DOB => array(IS_VALID => false, VALUE => null, ERR_MSG => ''),
);




// Validation de formalaire de connexion
if (array_key_exists(SUBMIT, $_POST)) {


// Validation du prenom
    $validation_signup[FIRST_NAME][VALUE] = trim(filter_input(INPUT_POST, FIRST_NAME, FILTER_SANITIZE_STRING));
    $first_name= $validation_signup[FIRST_NAME][VALUE];
    $validation_signup[FIRST_NAME][IS_VALID] = (false !== filter_var($first_name, FILTER_SANITIZE_STRING)
        && strlen($first_name) <= 20
        && $first_name != '');
    $validation_signup[FIRST_NAME][ERR_MSG] = ($validation_signup[FIRST_NAME][IS_VALID]) ? VAL_MSG : ERR_MSG;

//Validation du nom
    $validation_signup[LAST_NAME][VALUE] = trim(filter_input(INPUT_POST, LAST_NAME, FILTER_SANITIZE_STRING));
    $last_name = $validation_signup[LAST_NAME][VALUE];
    $validation_signup[LAST_NAME][IS_VALID] = (false !== filter_var($validation_signup[LAST_NAME][VALUE], FILTER_SANITIZE_STRING)
        && strlen($validation_signup[LAST_NAME][VALUE]) <= 45
        && $validation_signup[LAST_NAME][VALUE] != '');
    $validation_signup[LAST_NAME][ERR_MSG] = ($validation_signup[LAST_NAME][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation de l'email
    $validation_signup[EMAIL][VALUE] = filter_input(INPUT_POST, EMAIL, FILTER_SANITIZE_EMAIL);
    $email = $validation_signup[EMAIL][VALUE];
    $validation_signup[EMAIL][IS_VALID] = (false !== filter_var($email, FILTER_VALIDATE_EMAIL)
        && strlen($email) <= 60
        && $email != '');
    $validation_signup[EMAIL][ERR_MSG] = ($validation_signup[EMAIL][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation du password et de la confirmation du password
    $validation_signup[PASS][VALUE] = filter_input(INPUT_POST, PASS, FILTER_SANITIZE_STRING);
    $pass = $validation_signup[PASS][VALUE] ;
    $validation_signup[PASS_CONFIRM][VALUE] = filter_input(INPUT_POST, PASS_CONFIRM, FILTER_SANITIZE_STRING);
    if (($pass === $validation_signup[PASS_CONFIRM][VALUE]) && (1 === preg_match('/\w{6,}/', $pass))) {
        $validation_signup[PASS][IS_VALID] = true;
        $validation_signup[PASS_CONFIRM][IS_VALID] = true;
        $validation_signup[PASS][ERR_MSG] = VAL_MSG;
        $validation_signup[PASS_CONFIRM][ERR_MSG] = VAL_MSG;
    } else {
        $validation_signup[PASS][ERR_MSG] = ERR_MSG;
        $validation_signup[PASS_CONFIRM][ERR_MSG] = ERR_MSG;
    }


// Validation du numero de rue
    $validation_signup[STREET_NUM][VALUE] = trim(filter_input(INPUT_POST, STREET_NUM, FILTER_SANITIZE_STRING));
    $street_num =  $validation_signup[STREET_NUM][VALUE];
    $validation_signup[STREET_NUM][IS_VALID] = (1 === preg_match('/[0-9]{1,6}/', $street_num ));
    $validation_signup[STREET_NUM][ERR_MSG] = ($validation_signup[STREET_NUM][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation de la rue
    $validation_signup[STREET][VALUE] = trim(filter_input(INPUT_POST, STREET, FILTER_SANITIZE_STRING));
    $street = $validation_signup[STREET][VALUE];
    $validation_signup[STREET][IS_VALID] = (false !== filter_var($street, FILTER_SANITIZE_STRING)
        && strlen($validation_signup[STREET][VALUE]) <= 60
        && $street != '');
    $validation_signup[STREET][ERR_MSG] = ($validation_signup[STREET][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation de la ville
    $validation_signup[CITY][VALUE] = trim(filter_input(INPUT_POST, CITY, FILTER_SANITIZE_STRING));
    $city = $validation_signup[CITY][VALUE];
    $validation_signup[CITY][IS_VALID] = (false !== filter_var($city, FILTER_SANITIZE_STRING)
        && strlen($city) <= 60
        && $city != '');
    $validation_signup[CITY][ERR_MSG] = ($validation_signup[CITY][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation de la province
    $validation_signup[PROVINCE][VALUE] = trim(filter_input(INPUT_POST, PROVINCE, FILTER_SANITIZE_STRING));
    $province =  $validation_signup[PROVINCE][VALUE];
    $validation_signup[PROVINCE][IS_VALID] = (false !== filter_var($province, FILTER_SANITIZE_STRING)
        && strlen($province) <= 45
        && $province != '');
    $validation_signup[PROVINCE][ERR_MSG] = ($validation_signup[PROVINCE][IS_VALID]) ? VAL_MSG : ERR_MSG;

// Validation ZIP
    $validation_signup[ZIP][VALUE] = trim(filter_input(INPUT_POST, ZIP, FILTER_SANITIZE_STRING));
    $postal_code =  $validation_signup[ZIP][VALUE];
    $validation_signup[ZIP][IS_VALID] = (false !== filter_var($postal_code, FILTER_SANITIZE_STRING)
        && strlen($postal_code) <= 7
        && $postal_code != '');
    $validation_signup[ZIP][ERR_MSG] = ($validation_signup[ZIP][IS_VALID]) ? VAL_MSG : ERR_MSG;

//Validation DOB
    $validation_signup[DOB][VALUE] = filter_input(INPUT_POST, DOB, FILTER_SANITIZE_STRING);
    $date_of_birth = $validation_signup[DOB][VALUE];
    $validation_signup[DOB][IS_VALID] = (1 === preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $date_of_birth));
    $validation_signup[DOB][ERR_MSG] = ($validation_signup[DOB][IS_VALID]) ? VAL_MSG : ERR_MSG;


    $isFormValid = true;
    foreach ($validation_signup as $field) {
        if (!$field[IS_VALID]) {
            $isFormValid = false;
            break;
        }
    }

    if($isFormValid){
        require_once '_addresses.php';
        require_once '_user.php';
        $add_id =  add_address($street_num, $street, $city, $province, $postal_code);
       // var_dump($add_id);
        add_user($add_id, $first_name, $last_name, $email, $pass);
        $_SESSION[FIRST_NAME] = $first_name;
        $_SESSION[U_ID] =  add_user($add_id, $first_name, $last_name, $email, $pass);
        header('Location: index.php');
    }
}



/*if ($isFormValid) {
    echo 'le formulaire est valide';
} else {
    echo 'FORMULAIRE INCORRECT!!!';
}

var_dump($validation_signup);
echo '******************************';
var_dump($_POST);*/

//var_dump($_POST);

