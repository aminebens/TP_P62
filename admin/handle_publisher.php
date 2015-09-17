<?php
require_once '../data/_data.php';
require_once '../data/_publishers.php';

session_start();

if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ../index.php');
    exit();
}

$previous = 'index.php?view=publishers';
$title = 'Editeur';
$action = '';
$isUpdated = false;
$isFormValid = true;

if (array_key_exists(ACTION, $_GET)) {
    $action = $_GET[ACTION];
}

$valid_publisher = array(
    PUBLISHER_NAME => array(
        'value' => '',
        'isValid' => true,
        'errMsg' => ''
    ),
);

if (array_key_exists('create_submit', $_POST) || array_key_exists('edit_submit', $_POST)) {

    $valid_publisher[PUBLISHER_NAME]['value'] = trim(filter_input(INPUT_POST, PUBLISHER_NAME, FILTER_SANITIZE_STRING));
    $valid_publisher[PUBLISHER_NAME]['isValid'] = (strlen($valid_publisher[PUBLISHER_NAME]['value']) > 2);
    if (!$valid_publisher[PUBLISHER_NAME]['isValid']) {
        $errMsg = $valid_publisher[PUBLISHER_NAME]['errMsg'] = 'Le nom est non valid!';
    }

    foreach ($valid_publisher as $fields) {
        if(!$fields['isValid']) {
            $isFormValid = false;
            break;
        }
    }
}

if (array_key_exists('create_submit', $_POST)) {
    if ($isFormValid) {
        add_publisher($valid_publisher[PUBLISHER_NAME]['value']);
        header('Location: '.$previous);
        exit();
    }
} elseif (array_key_exists('edit_submit', $_POST)) {
    if ($isFormValid) {
        update_publisher($_GET['id'], $valid_publisher[PUBLISHER_NAME]['value']);
        $isUpdated = true;
    }
} elseif (array_key_exists('delete_submit', $_POST)) {
    delete_publisher($_GET['id']);
    header('Location: '.$previous);
    exit();
} elseif (array_key_exists('close_submit', $_POST)) {
    header('Location: '.$previous);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo SITE_NAME, ' Admin' ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../style/admin.css" />
</head>
<body>
<?php require_once('views/_view_adm_header.php'); ?>

<!-- Main admin sidebar -->
<?php require_once('views/_view_sidebar.php'); ?>

<!-- Main admin content -->
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <?php if(!$isFormValid) { ?>
        <div class="alert alert-danger" role="alert">
            <?php foreach ($valid_publisher as $fields) { ?>
                <p><?php echo $fields['errMsg']; ?></p>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="<?php echo ($isUpdated)?'alert alert-success':'' ?>">
        <p><?php echo ($isUpdated)?'Mis à jour avec succès':'' ?></p>
    </div>
    <p><a href="<?php echo $previous ?>">Retour</a></p>
    <?php if (EDIT == $action) {
        $publishers = get_publishers($_GET[ID]);
        ?>
        <h2 class="sub-header"><?php echo $title ?> - Modification</h2>
        <form method="post" class="col-md-4">
            <div class="form-group">
                <label for="<?php echo PUBLISHER_ID; ?>">ID: </label>
                <input id="<?php echo PUBLISHER_ID; ?>" name="<?php echo PUBLISHER_ID; ?>" type="text" class="form-control"
                       value="<?php echo (array_key_exists(ID, $_GET)) ? $publishers[0][PUBLISHER_ID] : '' ?>" disabled="disabled" />
            </div>
            <div class="form-group">
                <label for="<?php echo PUBLISHER_NAME; ?>">Nom: </label>
                <input id="<?php echo PUBLISHER_NAME; ?>" name="<?php echo PUBLISHER_NAME; ?>" type="text" class="form-control"
                       value="<?php echo (array_key_exists(ID, $_GET)) ? $publishers[0][PUBLISHER_NAME] : '' ?>" />
            </div>
            <button class="btn btn-warning" type="submit" name="edit_submit">Modifier</button>
            <button class="btn btn-default" type="submit" name="close_submit">Annuler</button>
        </form>
    <?php } elseif (ADD == $action) { ?>
        <h2 class="sub-header"><?php echo $title ?> - Nouveau</h2>
        <form method="post" class="col-md-4">
            <div class="form-group">
                <label for="<?php echo PUBLISHER_NAME; ?>">Nom: </label>
                <input id="<?php echo PUBLISHER_NAME; ?>" name="<?php echo PUBLISHER_NAME; ?>" type="text" class="form-control"
                       value="<?php echo (array_key_exists(PUBLISHER_NAME, $_POST)) ? $_POST[PUBLISHER_NAME] : '' ?>" />
            </div>
            <button class="btn btn-primary" type="submit" name="create_submit">Ajouter</button>
            <button class="btn btn-default" type="submit" name="close_submit">Annuler</button>
        </form>
    <?php } elseif (DELETE == $action) { $publishers = get_publishers($_GET[ID]); ?>
        <h2 class="sub-header"><?php echo $title ?> - Supprimer</h2>
        <p>Êtes-vous sûr de vouloir supprimer définitivement l'éditeur:
            "<?php echo (array_key_exists(ID, $_GET)) ? $publishers[0][PUBLISHER_NAME] : '' ?>" ?
        </p>
        <form method="post" class="col-md-4">
            <button class="btn btn-danger" type="submit" name="delete_submit">Supprimer</button>
            <button class="btn btn-default" type="submit" name="close_submit">Annuler</button>
        </form>
    <?php } ?>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>