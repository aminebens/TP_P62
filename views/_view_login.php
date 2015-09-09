<?php
// TODO: Check user login
require_once 'data/_user.php';
//var_dump($_POST);
//var_dump($_SESSION);

$is_valid_user = false;
/*$authenticate = '';
$errMsg = '';

// Validation de formalaire de connexion
$validation_login = array(
    'email' => array('isValid' => false, 'value' => null, 'errMsg' => ''),
    'pass' => array('isValid' => false, 'value' => null, 'errMsg' => ''),
);

// Validation de l'email
$validation_login[EMAIL]['value'] = filter_input(INPUT_POST, EMAIL, FILTER_SANITIZE_EMAIL);
$validation_login[EMAIL]['isValid'] = (false !== filter_var($validation_login[EMAIL]['value'], FILTER_VALIDATE_EMAIL));

// Validation du mot de pass
$validation_login[PASS]['value'] = filter_input(INPUT_POST, PASS, FILTER_SANITIZE_STRING);
$validation_login[PASS]['isValid'] = (1 === preg_match('/\w{5,}/', $validation_login[PASS]['value']));

$isFormValid = true;
foreach ($validation_login as $field) {
    if (! $field['isValid']) {
        $isFormValid = false;
        break;
    }
}*/

if ( array_key_exists('submit_login', $_POST) ) {
    if ( isset($_POST[EMAIL]) && isset($_POST[PASS]) ) {
        $is_valid_user = authenticate_user($_POST[EMAIL], $_POST[PASS]);
        //var_dump($is_valid_user);
        if ($is_valid_user) {
            $_SESSION[FIRST_NAME] = $is_valid_user[FIRST_NAME];
            header('Location: index.php');
        }
    }
}
?>
<!-- Formulaire de  Login -->
<form class="navbar-form navbar-right" method="post">
    <div class="form-group">
        <input type="text" name="<?php echo EMAIL ?>" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="<?php echo PASS ?>" placeholder="Password" class="form-control">
    </div>
    <button type="submit" name="submit_login" class="btn btn-success">Connexion</button>
</form>