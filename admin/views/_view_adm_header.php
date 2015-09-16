<?php
if ( array_key_exists('submit_logout', $_POST) ) {
    unset($_SESSION[FIRST_NAME]);
    unset($_SESSION['admin']);
    header('Location: ../index.php');
    exit();
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><?php echo SITE_NAME, ' Admin' ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php if(array_key_exists(FIRST_NAME, $_SESSION)) { ?>
            <form class="navbar-form navbar-right" method="post">
                <label><?php echo 'Bonjour, ', $_SESSION[FIRST_NAME]; ?></label>
                <button type="submit" name="submit_logout" class="btn btn-link" title="Déconnexion">
                    <span class="glyphicon glyphicon-log-out lg" aria-hidden="true"></span>
                </button>
            </form>
            <?php } ?>
        </div>
    </div>
</nav>