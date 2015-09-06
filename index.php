<?php
require_once 'data/_data.php';
require_once 'data/_categories.php';
define('CAT_NAME', 'name');
$categories = get_categories();
//var_dump($categories);
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
</head>
<body>
<?php require_once('views/_view_header.php') ?>
<!--TODO: Afficher menu categorie -->
<div class="col-md-1">
    <ul class="nav nav-pills nav-stacked">
        <?php
        foreach ($categories as $category) {
            echo '<li><a href="#">', $category['name'], '</a></li>';
        }
        ?>
    </ul>
</div>
<!--TODO: Afficher la list des BDs -->

<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>