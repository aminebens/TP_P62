<?php
require_once 'data/_data.php';
require_once 'data/_categories.php';
require_once 'data/_comics.php';

session_start();

define('P_CAT_ID', 'category_id');

$categories = get_categories();
$active = '';

if (array_key_exists('submit_logout', $_POST)) {
    if (array_key_exists(FIRST_NAME, $_SESSION)) {
        unset($_SESSION[FIRST_NAME]);
    }
    if (array_key_exists(U_ID, $_SESSION)) {
        unset($_SESSION[U_ID]);
    }
}

if (array_key_exists(P_CAT_ID, $_GET)) {
    $comics = get_comics($_GET[P_CAT_ID]);
} elseif (array_key_exists(P_GENRES, $_GET)) {
    $comics = get_comics($_GET[P_GENRES]);
} else {
    $comics = get_comics();
}

//var_dump($categories);
//var_dump($genres);
//var_dump($_SESSION);
//var_dump($_SERVER);
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
    <h4>Catégories</h4>
    <ul class="nav nav-pills nav-stacked">
        <?php
        foreach ($categories as $category) {
            if (array_key_exists(P_CAT_ID, $_GET)) {
                if ($_GET[P_CAT_ID] == $category[P_CAT_ID]) {
                    $active = 'active';
                }
            }
            echo '<li class="', $active, '"><a href="index.php?', P_CAT_ID, '=', $category[P_CAT_ID], '">', $category['name'], '</a></li>';
            $active = '';
        }
        ?>
    </ul>
</div>
<?php require_once('views/_view_filter.php'); ?>
<!-- Affiche la list des BDs -->
<div id="comics_list" class="row">
<?php if ($comics) { ?>
<div id="comics_list" class="row">
    <?php foreach ($comics as $comic) { ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <a href="comic_detail.php?<?php echo ITEM_ID.'='.$comic[ITEM_ID] ?>">
                    <img src="<?php echo $comic[ITEM_COVER] ?>" alt="<?php echo $comic[ITEM_TITLE] ?>" onerror="this.src='images/couv/place_holder.png'" />
                </a>
                <div class="caption">
                    <h5><a href="comic_detail.php?<?php echo ITEM_ID.'='.$comic[ITEM_ID] ?>">
                        <?php echo $comic[ITEM_TITLE] ?></a>
                    </h5>
                    <p>Prix: <?php echo '$', $comic[ITEM_PRICE] ?></p>
                </div>
            </div>
        </div>
    <?php } } else { echo '<p>Aucun résultat.</p>'; } ?>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>