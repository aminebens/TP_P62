<?php
// données de l'utilisateur pour la fonction authenticate_user();
require_once 'data/_user.php';

$login_message = ''; // message a afficher en cas de bonne ou mauvaise connexion
$email = null; // valeur du email
$password = null; // valeur du password
$user_data = false;

if ( array_key_exists('submit_login', $_POST) && array_key_exists(EMAIL, $_POST) && array_key_exists(PASS, $_POST)) {
    // L'utilisateur cherche à se connecter
    $email = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Authentification
    if ($user_data = authenticate_user($_POST[EMAIL], $_POST[PASS])) {
        $_SESSION[FIRST_NAME] = $user_data[FIRST_NAME];
        $_SESSION[U_ID] = $user_data[U_ID];
        $login_message = 'Bonjour, ' . $user_data[FIRST_NAME];
    } else {
        // echec
        $login_message = "L'identificateur et le mot de passe fournis ne concordent pas.";
    }
} elseif ( array_key_exists('submit_logout', $_POST) ) {
    unset($_SESSION[FIRST_NAME]); // supprimer la variable 'first_name' de la session
} else {
    if ( array_key_exists(FIRST_NAME, $_SESSION) ) {
        $login_message = 'Bonjour, ' . $_SESSION[FIRST_NAME];
    }
}

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
<?php } else { ?>
<ul class="nav navbar-nav navbar-right">
    <li><a href="signup.php">S'inscrire</a></li>
</ul>
<form class="navbar-form navbar-right" method="post">
    <div class="form-group">
        <input type="text" name="<?php echo EMAIL ?>" placeholder="Email" class="form-control">
    </div>
    <div class="form-group">
        <input type="password" name="<?php echo PASS ?>" placeholder="Password" class="form-control">
    </div>
    <button id="login_btn" type="submit" name="submit_login" class="btn btn-success"
            data-toggle="tooltip" data-placement="bottom" title="Hooray!" >Connexion</button>
    <p class="red" style="margin: 0;"><?php echo (!array_key_exists(FIRST_NAME, $_SESSION)) ? $login_message : ''; ?></p>
</form>
<?php } ?>