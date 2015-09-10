<?php
require_once 'data/_data.php';
require_once 'data/_comics.php';
require_once 'data/_authors.php';
require_once 'data/_publishers.php';

session_start();

$msg = '';
$isCartEmpty = false;

// Veriefie si une session du panier exist, sinon en crée une
if ( !array_key_exists(SESS_CART, $_SESSION) ) {
    $_SESSION[SESS_CART] = array();
    $_SESSION[SESS_CART_TOTAL] = 0;
}

// Ajoute un produit au panier
if ( array_key_exists(P_ADD_TO_CART, $_GET) ) {

    $item_id = $_GET[P_ADD_TO_CART];

    if (array_key_exists('item_qty', $_GET)) {
        $item_qty = $_GET['item_qty'];
        if(array_key_exists($item_id, $_SESSION[SESS_CART])) {
            $_SESSION[SESS_CART_TOTAL] -= $_SESSION[SESS_CART][$item_id];
            unset($_SESSION[SESS_CART][$item_id]);
        }
        $_SESSION[SESS_CART][$item_id] = $item_qty;
        $_SESSION[SESS_CART_TOTAL] += $item_qty;
        header('Location: cart.php');
        exit();
        //var_dump($_SESSION[SESS_CART]);
    }
}

// Supprimer un produit du panier
if ( array_key_exists(P_REMOVE_FROM_CART, $_GET) ) {

    $item_id = $_GET[P_REMOVE_FROM_CART];

    if(array_key_exists($item_id, $_SESSION[SESS_CART])) {
        $item_qty = $_SESSION[SESS_CART][$item_id];
        unset($_SESSION[SESS_CART][$item_id]);
        $_SESSION[SESS_CART_TOTAL] -= $item_qty;
    }
    header('Location: cart.php');
    exit();
}

// Vider le panier
if ( array_key_exists('clearCart', $_GET) ) {
    unset($_SESSION[SESS_CART]);
    $_SESSION[SESS_CART_TOTAL] = 0;
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
            <p>Votre panier est la  pour vous servir. Donnez-lui un but : remplissez-le avec des BDs.,</p>
        </div>
        <?php } else { ?>
        <table id="cart_table" class="table">
            <tr>
                <th>Votre panier</th>
                <th></th>
                <th>Prix/Unité</th>
                <th class="qty">Quantité</th>
                <th></th>
            </tr>
            <?php
            $items = $_SESSION[SESS_CART];
            //var_dump($cart);
            $total = 0;
            $nb_articles = $_SESSION[SESS_CART_TOTAL];
            foreach ($items as $item_id => $qty) {
                echo '<tr>';
                $item = get_item_details($item_id);
                $authors = get_authors($item[AUTHOR_ID]);
                $publishers = get_publishers($item[PUBLISHER_ID]);
                echo '<td><img src="', $item[ITEM_COVER], '" alt="', $item[ITEM_TITLE] ,'" onerror="this.src=\'images/couv/place_holder.png\'" /></td>';
                echo '<td><a href="comic_detail.php?',ITEM_ID,'=',$item[ITEM_ID], '"><span class="titre">', $item[ITEM_TITLE], '</span></a>',
                ' de ', $authors[0][WRITER], '<div>', $publishers[0][PUBLISHER_NAME], '</div></td>';
                echo '<td>', $item[ITEM_PRICE], '</td>';
                echo '<td class="qty">', $qty, '</td>';
                $total += $item[ITEM_PRICE] * $qty;
                echo '<td><a href="?', P_REMOVE_FROM_CART,'=', $item_id,'" >Supprimer</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
        <p>Sous-total (<?php echo $nb_articles; echo ($nb_articles>1) ? ' articles)':' article)' ?> : $<?php echo $total; ?></p>
    </div>
    <div class="col-md-2">
        <form class="form-inline" action="cart.php">
            <button type="submit" name="clearCart" class="btn btn-link red">
                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Vider le panier
            </button>
        </form>
        <form class="form-inline" action="checkout.php" method="post">
            <button type="submit" name="checkout" class="btn btn-link green">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Checkout
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