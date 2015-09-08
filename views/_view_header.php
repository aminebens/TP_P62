<?php
define('NAV_SEARCH', 'nav_search');
define('P_INPUT_SEARCH', 'input_search');

if (array_key_exists(NAV_SEARCH, $_GET)) {
    $comics = search_comics($_GET[P_INPUT_SEARCH]);
}
//var_dump($_GET[P_INPUT_SEARCH]);
?>
<!-- Affiche le header des pages -->
<header>
    <nav id="menu" class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo SITE_NAME; ?></a>
                <!-- Site main menu -->
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="<?php echo PAGE_INDEX ?>">Acceuil <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Les BDs</a></li>
                </ul>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav navbar-right">
                     <?php if (array_key_exists(FIRST_NAME, $_SESSION)) { ?>
                        <!-- Logged in -->
                         <li><a href="#">Bonjour, <?php echo $_SESSION[FIRST_NAME] ?></a></li>
                         <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart lg" aria-hidden="true"></span> (0)</a></li>
                         <li><a href="<?php $_SESSION = array(); session_destroy(); setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
                             echo $_SERVER['PHP_SELF'];?>"><span class="glyphicon glyphicon-log-out lg" aria-hidden="true"></span></li>
                     <?php } else { ?>
                         <!-- Logged out -->
                         <li><a href="#" data-toggle="modal" data-target="#<?php echo LOGIN ?>" >Connexion</a></li>
                         <li><a href="#" data-toggle="modal" data-target="#<?php echo SIGN_UP ?>">S'inscrire</a></li>
                     <?php } ?>
                 </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>


