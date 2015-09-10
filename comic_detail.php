<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';
require_once 'data/_authors.php';
require_once 'data/_publishers.php';

session_start();

if (array_key_exists(ITEM_ID, $_GET)) {
    $item = get_item_details($_GET[ITEM_ID]);
} else if (!$item) {
    $err_msg = 'Aucunne BD ne correspond à cette requête.';
} else {
    $err_msg = 'Aucun resultat.';
}

$authors = get_authors($item[AUTHOR_ID]);
$publishers = get_publishers($item[PUBLISHER_ID]);
//var_dump($item);
//var_dump($authors);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $item[ITEM_TITLE] ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style/main.css" />
</head>
<body>
<?php require_once('views/_view_header.php') ?>
<div class="container-fluid">
    <div class="col-md-4">
        <img class="thumbnail" src="<?php echo $item[ITEM_COVER]; ?>" alt="<?php echo $item[ITEM_TITLE]; ?>" onerror="this.src='images/couv/place_holder.png'" />
    </div>
    <div class="col-md-8">
        <h3><?php echo $item[ITEM_TITLE]; ?></h3>
        <p>Edition: <?php echo $publishers[0][PUBLISHER_NAME]; ?></p>
        <P>Date d'édition: <?php echo date('Y-m-d', strtotime($item[ITEM_P_DATE])) ?></p>
        <p>Scénario: <?php echo $authors[0][WRITER]; ?></p>
        <p>Dessin: <?php echo $authors[0][ARTIST]; ?></p>
        <p>ISBN: <?php echo $item[ITEM_ISBN]; ?></P>
        <p>Note: <?php echo $item[ITEM_RATING] ?>
            <?php if ($item[ITEM_RATING] >= 0) {
                    for($i = 1; $i <= round($item[ITEM_RATING]); $i++) { ?>
            <span class="glyphicon glyphicon-star gold" aria-hidden="true"></span>
            <?php }
                    for($i = round($item[ITEM_RATING])+1; $i <= MAX_NOTE; $i++) { ?>
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            <?php } } ?>
        </p>
        <p>Synopsis: <?php echo $item[ITEM_DESC] ?></p>
        <p>Prix: <?php echo '$',$item[ITEM_PRICE] ?></p>
        <form class="form" action="cart.php" method="get">
            <div class="form-group">
                <label for="qty">Quantité:</label>
                <input id="qty" class="form-control input-xs" type="text" name="item_qty" value="1" />
            </div>
            <div class="form-group">
                <button id="cart_detail" type="submit" name="<?php echo P_ADD_TO_CART ?>" class="btn btn-link" value="<?php echo $item[ITEM_ID]; ?>">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Acheter
                </button>
            </div>
        </form>
    </div>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>