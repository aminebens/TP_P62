<?php
$sidebar = array(
    'Dashboard' => 'index.php',
    'Auteurs' => '',
    'Editeurs' => '',
    'Catalogue' => '',
    'Utilisateurs' => '',
);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <?php foreach ($sidebar as $label => $link) { ?>
                <li><a href="<?php echo $link ?>"><?php echo $label; ?> <span class="sr-only dbtables">(current)</span></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
