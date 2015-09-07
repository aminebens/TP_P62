<?php
define('NAV_SEARCH', 'nav_search');
define('P_INPUT_SEARCH', 'input_search');
define('PAGE_INDEX', 'index.php');

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
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- Search form -->
                <form class="navbar-form navbar-left" role="search" action="<?php echo PAGE_INDEX ?>">
                    <div class="form-group">
                        <input type="text" name="<?php echo P_INPUT_SEARCH; ?>" class="form-control" placeholder="Search" />
                    </div>
                    <input type="submit" name="<?php echo NAV_SEARCH; ?>" class="btn btn-default" value="Rechercher" />
                </form>
                <!-- Site main menu -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo PAGE_INDEX ?>">Acceuil <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Les BDs</a></li>
                    <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart lg" aria-hidden="true"></span> (0)</a></li>
                    <li><a href="#">Admin</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>