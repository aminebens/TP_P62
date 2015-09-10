<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';
require_once 'data/_authors.php';

define('SESS_CART', 'cart');

session_start();

$msg = '';
$isCartEmpty = false;
$cart = array();

function iterate_session($session, $id) {
    $cart = $session;
    foreach ($cart as $k => $items) {
        foreach ($items as $item_id => $quantity) {
            if ($id == $item_id) {
                $old_qty = $quantity;
                return $k;
            }
        }
    }
    return false;
}

// Veriefie si une session du panier exist, sinon en crée une
if ( !array_key_exists(SESS_CART, $_SESSION) ) {
    $_SESSION[SESS_CART] = array();
}

// Ajoute un produit au panier
if ( array_key_exists('addToCart', $_GET) ) {

    $item_id = $_GET['addToCart'];

    if (array_key_exists('item_qty', $_GET)) {
        $item_qty = $_GET['item_qty'];
        if (iterate_session($_SESSION[SESS_CART], $item_id, $item_qty) !== false) {
            $k = iterate_session($_SESSION[SESS_CART], $item_id);
            unset($_SESSION[SESS_CART][$k]);
        }
        $cart[$item_id] = $item_qty;
        array_push($_SESSION[SESS_CART], $cart);
        header('Location: cart.php');
        exit();
        //var_dump($_SESSION[SESS_CART]);
    }
}

// Vider le panier
if ( array_key_exists('clearCart', $_GET) ) {
    unset($_SESSION[SESS_CART]);
    header('Location: cart.php');
    exit();
}

// Si le panier est vide affiche un message
if ( $_SESSION[SESS_CART] == null || array_key_exists('clearCart', $_GET) ) {
    $msg = 'Votre panier est vide pour le moment.';
    $isCartEmpty = true;
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
        <?php if ($isCartEmpty) {  ?>
        <div id="cart_empty">
            <p><?php echo $msg; ?></p>
            <p>Votre panier est là pour vous servir. Donnez-lui un but : remplissez-le avec des BDs.,</p>
        </div>
        <?php } else { ?>
        <table id="cart_table" class="table">
            <tr>
                <th>Votre panier</th>
                <th></th>
                <th>Prix/Unité</th>
                <th class="qty">Quantité</th>
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
                    ' de ', $authors[0][WRITER], '<div>', 'TODO: publisher', '</div></td>';
                    echo '<td>', $item[ITEM_PRICE], '</td>';
                    echo '<td class="qty">', $qty, '</td>';
                    $nb_articles += $qty;
                    $total += $item[ITEM_PRICE] * $qty;
                }
                echo '</tr>';
            }
            ?>
        </table>
        <p>Sous-total (<?php echo $nb_articles; echo ($nb_articles>1) ? ' articles)':' article)' ?> : $<?php echo $total; ?></p>
    </div>
    <div class="col-md-2">
        <form class="form-inline" action="cart.php">
            <button type="submit" name="clearCart" class="btn btn-link clearCart">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Vider le panier
            </button>
        </form>
    </div>
    <?php } ?>
</div>
<?php require_once('views/_view_footer.php') ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<?php $mysqli->close(); ?>
</body>
</html>