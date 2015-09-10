<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';

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
        var_dump($_SESSION[SESS_CART]);
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
<div id="cart">
    <h1>Votre panier</h1>
    <table class="table">
        <tr>
            <th></th>
            <th></th>
            <th>Prix</th>
            <th>Quantité</th>
        </tr>
        <tr>
            <td>image</td>
            <td>Titre</td>
            <td>$3.99</td>
        </tr>
    </table>
<?php
$cart = $_SESSION[SESS_CART];
var_dump($cart);
$total = 0;
foreach ($cart as $items) {
    foreach ($items as $item_id => $qty) {
        $item = get_item_details($item_id);
        echo '<p>Titre: ', $item[ITEM_TITLE] ,', Prix/Unitaire: $', $item[ITEM_PRICE] , ', Qté: ', $qty,'</p>';
        $total += $item[ITEM_PRICE] * $qty;
    }
}
echo '<p>Total: $', $total , '</p>';
?>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>
