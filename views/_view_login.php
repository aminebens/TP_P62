<?php
// données de l'utilisateur pour la fonction authenticate_user();
require_once 'data/_user.php';

$login_message = ''; // message a afficher en cas de bonne ou mauvaise connexion
$email = null; // valeur du email
$password = null; // valeur du password
$user_data = false;

$errMsg = '';
$isAuth = true;

$valid_login = array(
    EMAIL => array(
        'value' => '',
        'isValid' => true,
        'errMsg' => ''
    ),
    PASS => array(
        'value' => '',
        'isValid' => true,
        'errMsg' => ''
    )
);

if ( array_key_exists('submit_login', $_POST) ) {
    // L'utilisateur cherche à se connecter
    $email = filter_input(INPUT_POST, EMAIL, FILTER_SANITIZE_EMAIL);
    $isValidEmail = (false !== (filter_var($email, FILTER_VALIDATE_EMAIL)));

    // Validation du courriel
    $valid_login[EMAIL]['value'] = filter_input(INPUT_POST, EMAIL, FILTER_SANITIZE_EMAIL);
    $valid_login[EMAIL]['isValid'] = (false !== (filter_var($valid_login[EMAIL]['value'], FILTER_VALIDATE_EMAIL)));
    if (!$valid_login[EMAIL]['isValid']) {
        $errMsg = $valid_login[EMAIL]['errMsg'] = 'Courriel non valid';
    }

    // Validation du mot de passe
    $valid_login[PASS]['value'] = filter_input(INPUT_POST, PASS, FILTER_SANITIZE_STRING);
    $valid_login[PASS]['isValid'] = (strlen($valid_login[PASS]['value']) > 1);
    if (!$valid_login[PASS]['isValid']) {
        $errMsg = $valid_login[PASS]['errMsg'] = 'Le mot de passe doit être au minimum de 1 caractère';
    }

    if ($valid_login[EMAIL]['isValid'] && $valid_login[PASS]['isValid']) {
        // Authentification
        if ($user_data = authenticate_user($_POST[EMAIL], $_POST[PASS])) {
            $_SESSION[FIRST_NAME] = $user_data[FIRST_NAME];
            $_SESSION[U_ID] = $user_data[U_ID];
            $login_message = 'Bonjour, ' . $user_data[FIRST_NAME];
        } else {
            // echec
            $isAuth = false;
            $errMsg = "Courriel et mot de passe ne concordent pas";
        }
    }
} elseif ( array_key_exists('submit_logout', $_POST) ) {
    unset($_SESSION[FIRST_NAME]); // supprimer la variable 'first_name' de la session
} else {
    if ( array_key_exists(FIRST_NAME, $_SESSION) ) {
        $login_message = 'Bonjour, ' . $_SESSION[FIRST_NAME];
    }
}

$isFormValid = true;
foreach ($valid_login as $fields) {
    if(!$fields['isValid']) {
        $isFormValid = false;
        break;
    }
}

//recuperation du nom de la page dans l'url
$filename = $_SERVER['PHP_SELF'];
$filename_pos= strrpos($filename , '/');
$filename = substr($filename , $filename_pos + 1);
//var_dump($filename);
?>

    <!-- Formulaire de  Login -->
<ul class="nav navbar-nav navbar-right">
    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart lg"></span> (<?php echo $_SESSION[SESS_CART_TOTAL]; ?>)</a></li>
</ul>

<?php if(array_key_exists(FIRST_NAME, $_SESSION)) { ?>
<form class="navbar-form navbar-right" method="post" action="index.php">
    <label><?php echo $login_message; ?></label>
    <button type="submit" name="submit_logout" class="btn btn-link" title="Déconnexion">
        <span class="glyphicon glyphicon-log-out lg" aria-hidden="true"></span>
    </button>
</form>
<?php } elseif($filename !== 'signup.php') { ?>
<ul class="nav navbar-nav navbar-right">
    <li><a href="signup.php">S'inscrire</a></li>
</ul>
<form class="navbar-form navbar-right" method="post" id="loginForm">
    <div class="form-group">
        <input type="text" name="<?php echo EMAIL ?>" placeholder="Email"
               value="<?php
               echo (array_key_exists(EMAIL, $_POST)) ? $_POST[EMAIL] : '';
               ?>" class="form-control <?php echo (!$valid_login[EMAIL]['isValid'] || !$isAuth) ? 'err_msg' : '' ?>" />
    </div>
    <div class="form-group">
        <input type="password" name="<?php echo PASS ?>" placeholder="Password"
               value="<?php echo (array_key_exists(PASS, $_POST)) ? $_POST[PASS] : '';?>"
               class="form-control <?php echo ( !$valid_login[PASS]['isValid'] || !$isAuth) ? 'err_msg' : '' ?>" />
    </div>
    <button id="login_btn" type="submit" name="submit_login" class="btn btn-success">Connexion</button>
</form>
    <ul class="nav navbar-nav navbar-right">
        <li><a id="errAuth" class="red" style="cursor:default" href="#"><?php echo $errMsg; ?></a></li>
    </ul>
<?php }else{ ?>
<h3 class="msg-inscription">Inscrivez vous maintenant!</h3>
<?php } ?>

