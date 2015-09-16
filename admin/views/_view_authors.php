<?php
require_once '../data/_authors.php';

$authors = get_authors();
//var_dump($authors);
?>
<h2 class="sub-header">Auteurs</h2>
<a href="handle_author.php?action=add" class="edit_author" title="Ajouter de nouveaux auteurs" id="new">
    <span class="glyphicon glyphicon-plus"></span>
</a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th>ID</th>
            <th>Scénariste</th>
            <th>Déssinateur</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($authors as $author) { ?>
            <tr>
                <th scope="row">
                    <a href="handle_author.php?action=edit&id=<?php echo $author[AUTHOR_ID]; ?>" class="edit_author" title="Modifer">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </th>
                <th scope="row">
                    <a href="handle_author.php?action=delete&id=<?php echo $author[AUTHOR_ID]; ?>" class="edit_author red" title="Supprimer">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </th>
                <td><?php echo $author[AUTHOR_ID]; ?></td>
                <td><?php echo $author[WRITER]; ?></td>
                <td><?php echo $author[ARTIST]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>