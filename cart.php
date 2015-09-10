<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';
require_once 'data/_authors.php';

define('SESS_CART', 'cart');

session_start();

$cart = array();
if ( ! array_key_exists(SESS_CART, $_SESSION)) {
    $_SESSION[SESS_CART] = array();
}

if ( array_key_exists('addToCart', $_GET) ) {

    $item_id = $_GET['addToCart'];

    if (array_key_exists('item_qty', $_GET)) {
        $item_qty = $_GET['item_qty'];
        $cart[$item_id] = $item_qty;
        array_push($_SESSION[SESS_CART], $cart);
        //var_dump($_SESSION[SESS_CART]);
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
<div id="cart" class="row">
    <div class="col-md-10">
        <table id="cart_table" class="table">
            <tr>
                <th>Votre panier</th>
                <th></th>
                <th>Prix</th>
                <th>Quantité</th>
            </tr>
            <?php
            $cart = $_SESSION[SESS_CART];
            //var_dump($cart);
            $total = 0;
            $nb_articles = 0;
            foreach ($cart as $items) {
                echo '<tr>';
                foreach ($items as $item_id => $qty) {
                    $item = get_item_details($item_id);
                    $authors = get_authors($item[AUTHOR_ID]);
                    echo '<td><img src="', $item[ITEM_COVER], '" alt="', $item[ITEM_TITLE] ,'"/></td>';
                    echo '<td><a href="comic_detail.php?',ITEM_ID,'=',$item[ITEM_ID], '"><span class="titre">', $item[ITEM_TITLE], '</span></a>',
                    ' de ', $authors[0][WRITER], '<div>', 'publisher', '</div></td>';
                    echo '<td>', $item[ITEM_PRICE], '</td>';
                    echo '<td>', $qty, '</td>';
                    $nb_articles += $qty;
                    $total += $item[ITEM_PRICE] * $qty;
                }
                echo '</tr>';
            }
            ?>
        </table>
        <p>Sous-total (<?php echo $nb_articles; ?> articles) : $<?php echo $total; ?></p>
    </div>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>
