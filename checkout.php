<?php
require_once 'data/_data.php';
require_once 'data/_user.php';
//require_once 'data/_addresses.php';
require_once 'data/_comics.php';

session_start();


$msg = '';

if ( array_key_exists('checkout', $_POST) && array_key_exists(SESS_CART, $_SESSION) ) {
    if ( array_key_exists(U_ID, $_SESSION) ) {
        $msg = 'Merci de vos achats';
    } else {
        header('Location: signup.php');
        exit();
    }
}

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
<div class="container-fluid">
    <?php echo $msg; ?>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>