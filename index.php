<?php
require_once 'data/_data.php';
require_once 'data/_categories.php';
require_once 'data/_comics.php';

define('CAT_NAME', 'name');
define('P_CAT_ID', 'category_id');

$categories = get_categories();

if (array_key_exists(P_CAT_ID, $_GET)) {
    $comics = get_comics($_GET[P_CAT_ID]);
} else {
    $comics = get_comics();
}

//var_dump($categories);
//var_dump($comics);
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
<!-- Affiche menu categorie -->
<div id="cat_nav" class="col-md-1">
    <ul class="nav nav-pills nav-stacked">
        <?php
        foreach ($categories as $category) {
            echo '<li><a href="index.php?',P_CAT_ID, '=', $category[P_CAT_ID] ,'">', $category['name'], '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- Affiche la list des BDs -->
<?php if ($comics) { ?>
<div id="comics_list" class="row">
    <?php foreach ($comics as $comic) { ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?php echo $comic['cover_img_path'] ?>" alt="<?php echo $comic['title'] ?>">
                <div class="caption">
                    <h3><?php echo $comic['title'] ?></h3>
                    <p>Prix: <?php echo '$', $comic['price'] ?></p>
                    <p><a href="#" class="btn btn-primary" role="button">Detail</a>
                    <a href="#" class="btn btn-default" role="button">Ajouter au panier</a></p>
                </div>
            </div>
        </div>
    <?php } } else { echo '<p>Aucun résultat.</p>'; } ?>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>