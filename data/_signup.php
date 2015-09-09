<?php

// TODO : finir le pass confirm et le formulaire sera confirmer.. rajouter le css .has-error (boot) et pousser le nouvel user ds la BDD
define('SUBMIT', 'submit');
define('ERR_MSG', 'err_msg');
define('VALUE', 'value');
define('IS_VALID', 'is_valid');


//var_dump($_POST);






// Validation de formalaire de connexion
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

// Validation du prenom
$validation_signup[FIRST_NAME][VALUE] = filter_input(INPUT_POST, FIRST_NAME, FILTER_SANITIZE_STRING);
$validation_signup[FIRST_NAME][IS_VALID] = (false !== filter_var($validation_signup[FIRST_NAME][VALUE], FILTER_SANITIZE_STRING)
                                            && strlen($validation_signup[FIRST_NAME][VALUE]) <= 20
                                            && $validation_signup[FIRST_NAME][VALUE] != '' );
//$validation_signup[FIRST_NAME][ERR_MSG] = ($validation_signup[FIRST_NAME][IS_VALID]) ? '' : '.has-error';

//Validation du nom
$validation_signup[LAST_NAME][VALUE] = filter_input(INPUT_POST, LAST_NAME, FILTER_SANITIZE_STRING);
$validation_signup[LAST_NAME][IS_VALID] = (false !== filter_var($validation_signup[LAST_NAME][VALUE], FILTER_SANITIZE_STRING)
                                            && strlen($validation_signup[LAST_NAME][VALUE]) <= 45
                                            && $validation_signup[LAST_NAME][VALUE] != '' );
//$validation_signup[LAST_NAME][ERR_MSG] = ($validation_signup[LAST_NAME][IS_VALID]) ? '' : '.has-error';

// Validation de l'email
$validation_signup[EMAIL][VALUE] = filter_input(INPUT_POST, EMAIL, FILTER_SANITIZE_EMAIL);
$validation_signup[EMAIL][IS_VALID] = (false !== filter_var($validation_signup[EMAIL][VALUE], FILTER_VALIDATE_EMAIL)
                                            && strlen($validation_signup[EMAIL][VALUE]) <= 60
                                            && $validation_signup[EMAIL][VALUE] != '' );
//$validation_signup[EMAIL][ERR_MSG] =($validation_signup[EMAIL][IS_VALID]) ? '' : '.has-error';

// Validation du password et de la confirmation du password
$validation_signup[PASS][VALUE] = filter_input(INPUT_POST, PASS, FILTER_SANITIZE_STRING);
$validation_signup[PASS_CONFIRM][VALUE] = filter_input(INPUT_POST, PASS_CONFIRM, FILTER_SANITIZE_STRING);
$validation_signup[PASS][IS_VALID] = (1 === preg_match('/\w{6,}/', $validation_signup[PASS][VALUE])) && ($validation_signup[PASS][VALUE] === $validation_signup[PASS_CONFIRM][VALUE]);
$validation_signup[PASS][ERR_MSG] = ($validation_signup[PASS][IS_VALID]) ? '' : '.has-error';
$validation_signup[PASS_CONFIRM][ERR_MSG] = ($validation_signup[PASS][IS_VALID]) ? '' : '.has-error';


// Validation du numero de rue
$validation_signup[STREET_NUM][VALUE] = filter_input(INPUT_POST, STREET_NUM, FILTER_SANITIZE_STRING);
$validation_signup[STREET_NUM][IS_VALID] = (1 === preg_match('/[0-9]{1,3}/', $validation_signup[STREET_NUM][VALUE]));
//$validation_signup[STREET_NUM][ERR_MSG] = ($validation_signup[STREET_NUM][IS_VALID]) ? '' : '.has-error';

// Validation de la rue
$validation_signup[STREET][VALUE] = filter_input(INPUT_POST, STREET, FILTER_SANITIZE_STRING);
$validation_signup[STREET][IS_VALID] = (false !== filter_var($validation_signup[STREET][VALUE], FILTER_SANITIZE_STRING)
                                            && strlen($validation_signup[STREET][VALUE]) <= 60
                                            && $validation_signup[STREET][VALUE] != STREET);
//$validation_signup[STREET][ERR_MSG] = ($validation_signup[STREET][IS_VALID]) ? '' : '.has-error';

// Validation de la ville
$validation_signup[CITY][VALUE] = filter_input(INPUT_POST, CITY, FILTER_SANITIZE_STRING);
$validation_signup[CITY][IS_VALID] = (false !== filter_var($validation_signup[CITY][VALUE], FILTER_SANITIZE_STRING)
                                            && strlen($validation_signup[CITY][VALUE]) <= 60
                                            && $validation_signup[CITY][VALUE] != '' );
//$validation_signup[CITY][ERR_MSG] =($validation_signup[CITY][IS_VALID]) ? '' : '.has-error';

// Validation de la province
$validation_signup[PROVINCE][VALUE] = filter_input(INPUT_POST, PROVINCE, FILTER_SANITIZE_STRING);
$validation_signup[PROVINCE][IS_VALID] = (false !== filter_var($validation_signup[PROVINCE][VALUE], FILTER_SANITIZE_STRING)
                                            && strlen($validation_signup[PROVINCE][VALUE]) <= 45
                                            && $validation_signup[PROVINCE][VALUE] != '' );
//$validation_signup[PROVINCE][ERR_MSG] =($validation_signup[PROVINCE][IS_VALID]) ? '' : '.has-error';

// Validation ZIP
$validation_signup[ZIP][VALUE] = filter_input(INPUT_POST, ZIP, FILTER_SANITIZE_STRING);
$validation_signup[ZIP][IS_VALID] = (1 === preg_match('/[A-Z][0-9][A-Z] [0-9][A-Z][0-9]/', $validation_signup[ZIP][VALUE]));
//$validation_signup[ZIP][ERR_MSG] =($validation_signup[ZIP][IS_VALID]) ? '' : '.has-error';

//Validation DOB
$validation_signup[DOB][VALUE] = filter_input(INPUT_POST, DOB, FILTER_SANITIZE_STRING);
$validation_signup[DOB][IS_VALID] = (1 === preg_match('/[0-9]{4}-[0-9]{2}-[0-9]{2}/', $validation_signup[DOB][VALUE]));
//$validation_signup[DOB][ERR_MSG] =($validation_signup[DOB][IS_VALID]) ? '' : '.has-error';




foreach ($validation_signup as $field){
    if(!$field[IS_VALID]){
        $field[ERR_MSG] = '.has-error';
    }
}

$isFormValid = true;
foreach ($validation_signup as $field) {
    if (! $field[IS_VALID]) {
        $isFormValid = false;
        break;
    }
}
 if($isFormValid){
     echo 'le formulaire est valide';
 }else{
     echo 'FORMULAIRE INCORRECT!!!';
 }


var_dump($validation_signup);

