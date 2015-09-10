<?php
require_once 'data/_data.php';
require_once 'data/_signup.php';

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
        <div class="form-group">
            <label for="<?php echo FIRST_NAME; ?>">Prénom:</label>
            <input id="<?php echo FIRST_NAME; ?>" name="<?php echo FIRST_NAME; ?>" type="text" maxlength="20" placeholder="Entrer votre prénom" class="form-control" />
        </div>
        <div class="form-group">
            <label for="<?php echo LAST_NAME; ?>">Nom:</label>
            <input id="<?php echo LAST_NAME; ?>" name="<?php echo LAST_NAME; ?>" type="text" maxlength="45" placeholder="Entrer votre nom" class="form-control" />
        </div>
        <div class="bootcrash_streetnum">
            <label for="<?php echo STREET_NUM; ?>">Numero:</label>
            <input id="<?php echo STREET_NUM; ?>" name="<?php echo STREET_NUM; ?>" type="text" maxlength="3" placeholder="Numero" class="form-control" />
        </div>
        <div>
            <label for="<?php echo STREET; ?>">Rue:</label>
            <input id="<?php echo STREET; ?>" name="<?php echo STREET; ?>" type="text" maxlength="60" placeholder="rue" class="form-control" />
        </div>
        <div>
            <label for="<?php echo CITY; ?>">Ville:</label>
            <input id="<?php echo CITY; ?>" name="<?php echo CITY; ?>" type="text" maxlength="45" placeholder="Ville" class="form-control" />
        </div>
        <div>
            <label for="<?php echo PROVINCE; ?>">Province:</label>
            <input id="<?php echo PROVINCE; ?>" name="<?php echo PROVINCE; ?>" type="text" maxlength="45" placeholder="Province" class="form-control" />
        </div>
        <div>
            <label for="<?php echo ZIP; ?>">ZIP:</label>
            <input id="<?php echo ZIP; ?>" name="<?php echo ZIP; ?>" type="text" maxlength="7" placeholder="X1X 1x1" class="form-control" />
        </div>
        <div class="form-group">
            <label for="<?php echo DOB; ?>">Date de naissance:</label>
            <input id="<?php echo DOB; ?>" name="<?php echo DOB; ?>" type="date" placeholder="AAAA-MM-DD" class="form-control" />
        </div>
        <div class="form-group">
            <label for="<?php echo EMAIL; ?>">Email:</label>
            <input id="<?php echo EMAIL; ?>" name="<?php echo EMAIL; ?>" type="email" maxlength="60" placeholder="Entrer votre email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="<?php echo PASS; ?>">Mot de passe:</label>
            <input id="<?php echo PASS; ?>" name="<?php echo PASS; ?>" type="password" maxlength="40" placeholder="Entrer votre mot de passe" class="form-control" />
        </div>
        <div class="form-group">
            <label for="<?php echo PASS_CONFIRM; ?>">Confirmez mot de passe:</label>
            <input id="<?php echo PASS_CONFIRM; ?>" name="<?php echo PASS_CONFIRM; ?>" type="password" placeholder="Confirmez votre mot de passe" class="form-control" />
        </div>
        <input type="submit" name="submit" value="Inscription" class="btn btn-primary" />
    </form>
</div>



<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>
