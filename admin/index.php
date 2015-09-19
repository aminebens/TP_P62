<?php
require_once '../data/_data.php';

session_start();

if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ../index.php');
    exit();
}

$view = 'dashboard';
if (array_key_exists('view', $_GET)) {
    $view = $_GET['view'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME, ' Admin' ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../style/admin.css" />
</head>
<body>
<?php require_once('views/_view_adm_header.php'); ?>

<!-- Main admin sidebar -->
<?php require_once('views/_view_sidebar.php'); ?>

<!-- Main admin content -->
<div class="col-sm-9 col-sm-offset-3 col-md-11 col-md-offset-1 main">
<!--  Affiche les views  -->
    <?php
    switch ($view) {
        case 'authors': require_once('views/_view_authors.php'); break;
        case 'publishers': require_once('views/_view_publishers.php'); break;
        case 'comics': require_once('views/_view_comics.php'); break;
//        case 'users': require_once('views/_view_users.php'); break;
        default: echo '<h1 class="page-header">Dashboard</h1>'; break;
    }
    ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>