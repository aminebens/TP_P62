<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';

if (array_key_exists(ITEM_ID, $_GET)) {
    $item = get_item_details($_GET[ITEM_ID]);
} else if (!$item) {
    $err_msg = 'Aucunne BD ne correspond à cette requête.';
} else {
    $err_msg = 'Aucun resultat.';
}
//var_dump($item);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style/main.css" />
</head>
<body>
<?php require_once('views/_view_header.php') ?>
<div>
    <div class="col-md-3">
        <img src="<?php echo $item[ITEM_COVER]; ?>" alt="<?php echo $item[ITEM_TITLE]; ?>" />
    </div>
    <div class="col-md-6">
        <h3><?php echo $item[ITEM_TITLE]; ?></h3>
        <P>Date d'édition: <?php echo date('Y-m-d', strtotime($item[ITEM_P_DATE])) ?></p>
        <p>ISBN: <?php echo $item[ITEM_ISBN]; ?></P>
        <p>Note: <?php echo $item[ITEM_RATING] ?>
            <?php if ($item[ITEM_RATING] >= 0) {
                    for($i = 1; $i <= $item[ITEM_RATING]; $i++) { ?>
            <span class="glyphicon glyphicon-star gold" aria-hidden="true"></span>
            <?php }
                    for($i = $item[ITEM_RATING]+1; $i <= 5; $i++) { ?>
            <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            <?php } } ?>
        </p>
        <p>synopsis: <?php echo $item[ITEM_DESC] ?></p>
        <p>Prix: <?php echo '$',$item[ITEM_PRICE] ?></p>
        <p>
            <button type="button" class="btn btn-default btn-md">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Acheter
            </button>
        </p>
    </div>
    <div class="col-md-3"></div>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>