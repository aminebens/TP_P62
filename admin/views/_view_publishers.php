<?php
require_once '../data/_publishers.php';

$link = 'handle_publisher.php';
$publishers = get_publishers();
//var_dump($publishers);
?>
<h2 class="sub-header">Editeurs</h2>
<a href="<?php echo $link.'?'.ACTION.'='.ADD; ?>" title="Ajouter un nouveau éditeur">
    <span class="glyphicon glyphicon-plus"></span>
</a>
<div class="table-responsive">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th colspan="2"></th>
            <th>ID</th>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($publishers as $publisher) { ?>
            <tr>
                <th>
                    <a href="<?php echo $link.'?'.ACTION.'='.EDIT.'&'.ID.'='.$publisher[PUBLISHER_ID]; ?>" title="Modifer">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                </th>
                <th>
                    <a href="<?php echo $link.'?'.ACTION.'='.DELETE.'&'.ID.'='.$publisher[PUBLISHER_ID]; ?>" class="red" title="Supprimer">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </th>
                <td><?php echo $publisher[PUBLISHER_ID]; ?></td>
                <td><?php echo $publisher[PUBLISHER_NAME]; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>