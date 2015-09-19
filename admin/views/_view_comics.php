<?php
require_once '../data/_comics.php';
require_once '../data/_publishers.php';
require_once '../data/_authors.php';
require_once '../data/_categories.php';

$link = 'handle_comic.php';
$comics = get_comics();

?>
<h2 class="sub-header">Les BDs</h2>
<a href="<?php echo $link.'?'.ACTION.'='.ADD; ?>" title="Ajouter une nouvelle BD">
    <span class="glyphicon glyphicon-plus"></span>
</a>
<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th colspan="2"></th>
            <th></th>
            <th>ID</th>
            <th>Titre</th>
            <th>Editeur</th>
            <th>Scénarist</th>
            <th>Artist</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Note</th>
            <th>Publication</th>
            <th>ISBN</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($comics as $comic) { ?>
            <tr>
                <th>
                    <a href="<?php echo $link.'?'.ACTION.'='.EDIT.'&'.ID.'='.$comic[ITEM_ID]; ?>" title="Modifer">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </th>
                <th>
                    <a href="<?php echo $link.'?'.ACTION.'='.DELETE.'&'.ID.'='.$comic[ITEM_ID]; ?>" class="red" title="Supprimer">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </th>
                <td><img src="../<?php echo $comic[ITEM_COVER]; ?>" /></td>
                <td><?php echo $comic[ITEM_ID]; ?></td>
                <td><?php echo $comic[ITEM_TITLE]; ?></td>
                <td><?php echo get_publishers($comic[PUBLISHER_ID])[0][PUBLISHER_NAME]; ?></td>
                <td><?php echo get_authors($comic[AUTHOR_ID])[0][WRITER]; ?></td>
                <td><?php echo get_authors($comic[AUTHOR_ID])[0][ARTIST]; ?></td>
                <td><?php echo get_categories($comic[CAT_ID])[0][CAT_NAME]; ?></td>
                <td><?php echo '$'.$comic[ITEM_PRICE]; ?></td>
                <td><?php echo $comic[ITEM_RATING]; ?></td>
                <td><?php $date=date_create($comic[ITEM_P_DATE]); echo date_format($date, "Y/m/d"); ?></td>
                <td><?php echo $comic[ITEM_ISBN]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>