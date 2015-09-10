<?php
require_once 'data/_data.php';
require_once 'data/_signup.php';

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME; ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style/main.css" />
</head>
<body>
<?php require_once('views/_view_header.php') ?>


<div class="center">
    <form name="form_login" method="post">
        <div class="juxtapose">
            <h4>VOS INFORMATIONS:</h4>
            <div class="form-group">
                <label for="<?php echo FIRST_NAME; ?>">Prénom:</label>
                <input id="<?php echo FIRST_NAME; ?>" name="<?php echo FIRST_NAME; ?>" type="text" maxlength="20" placeholder="<?php echo (array_key_exists(FIRST_NAME, $_POST))? $_POST[FIRST_NAME] : 'Entrer votre prénom' ?>" class="form-control <?php echo $validation_signup[FIRST_NAME][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo LAST_NAME; ?>">Nom:</label>
                <input id="<?php echo LAST_NAME; ?>" name="<?php echo LAST_NAME; ?>" type="text" maxlength="45" placeholder="<?php echo (array_key_exists(LAST_NAME, $_POST))? $_POST[LAST_NAME] : 'Entrer votre nom' ?>" class="form-control <?php echo $validation_signup[LAST_NAME][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo DOB; ?>">Date de naissance:</label>
                <input id="<?php echo DOB; ?>" name="<?php echo DOB; ?>" type="date" placeholder="<?php echo (array_key_exists(DOB, $_POST))? $_POST[DOB] : 'aaaa-mm-jj' ?>" class="form-control <?php echo $validation_signup[DOB][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo EMAIL; ?>">Email:</label>
                <input id="<?php echo EMAIL; ?>" name="<?php echo EMAIL; ?>" type="email" maxlength="60" placeholder="<?php echo (array_key_exists(EMAIL, $_POST))? $_POST[EMAIL] : 'Entrer votre email' ?>" class="form-control <?php echo $validation_signup[EMAIL][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo PASS; ?>">Mot de passe:</label>
                <input id="<?php echo PASS; ?>" name="<?php echo PASS; ?>" type="password" maxlength="40" placeholder="Entrer votre mot de passe" class="form-control <?php echo $validation_signup[PASS][ERR_MSG] ?>" />
            <?php echo (array_key_exists(SUBMIT, $_POST) && !$validation_signup[PASS][IS_VALID])? '<p>Le mot de passe doit contenir au moins 6 caracteres!</p>' : '' ?>
            </div>
            <div class="form-group">
                <label for="<?php echo PASS_CONFIRM; ?>">Confirmez mot de passe:</label>
                <input id="<?php echo PASS_CONFIRM; ?>" name="<?php echo PASS_CONFIRM; ?>" type="password" placeholder="Confirmez votre mot de passe" class="form-control <?php echo $validation_signup[PASS_CONFIRM][ERR_MSG] ?>" />
            </div>
        </div>
        <div class="juxtapose">
            <h4>VOTRE ADRESSE:</h4>
            <div class="form-group">
                <label for="<?php echo STREET_NUM; ?>">Numero:</label>
                <input id="<?php echo STREET_NUM; ?>" name="<?php echo STREET_NUM; ?>" type="text" maxlength="6" placeholder="<?php echo (array_key_exists(STREET_NUM, $_POST))? $_POST[STREET_NUM] : 'No de rue' ?>" class="form-control <?php echo $validation_signup[STREET_NUM][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo STREET; ?>">Rue:</label>
                <input id="<?php echo STREET; ?>" name="<?php echo STREET; ?>" type="text" maxlength="60" placeholder="<?php echo (array_key_exists(STREET, $_POST))? $_POST[STREET] : 'Rue' ?>" class="form-control <?php echo $validation_signup[STREET][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo CITY; ?>">Ville:</label>
                <input id="<?php echo CITY; ?>" name="<?php echo CITY; ?>" type="text" maxlength="45" placeholder="<?php echo (array_key_exists(CITY, $_POST))? $_POST[CITY] : 'Ville' ?>" class="form-control <?php echo $validation_signup[CITY][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo PROVINCE; ?>">Province:</label>
                <input id="<?php echo PROVINCE; ?>" name="<?php echo PROVINCE; ?>" type="text" maxlength="45" placeholder="<?php echo (array_key_exists(PROVINCE, $_POST))? $_POST[PROVINCE] : 'Province' ?>" class="form-control <?php echo $validation_signup[PROVINCE][ERR_MSG] ?>" />
            </div>
            <div class="form-group">
                <label for="<?php echo ZIP; ?>">ZIP:</label>
                <input id="<?php echo ZIP; ?>" name="<?php echo ZIP; ?>" type="text" maxlength="7" placeholder="<?php echo (array_key_exists(ZIP, $_POST))? $_POST[ZIP] : 'XnX nXn' ?>" class="form-control <?php echo $validation_signup[ZIP][ERR_MSG] ?>" />
            </div>
            <span>* champs obligatoires</span>
        </div>
        <div class="center">
             <input type="submit" name="submit" value="Inscription" class="btn btn-primary" />
        </div>
    </form>
</div>



<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>
