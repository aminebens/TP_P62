<?php
require_once '../data/_data.php';
require_once '../data/_authors.php';

session_start();

if (!array_key_exists('admin', $_SESSION)) {
    header('Location: ../index.php');
    exit();
}

$action = '';
$isUpdated = false;
$isFormValid = true;

if (array_key_exists('action', $_GET)) {
    $action = $_GET['action'];
}

$valid_authors = array(
    WRITER => array(
        'value' => '',
        'isValid' => true,
        'errMsg' => ''
    ),
    ARTIST => array(
        'value' => '',
        'isValid' => true,
        'errMsg' => ''
    ),
);

if (array_key_exists('create_submit', $_POST) || array_key_exists('edit_submit', $_POST)) {

    $valid_authors[WRITER]['value'] = trim(filter_input(INPUT_POST, WRITER, FILTER_SANITIZE_STRING));
    $valid_authors[WRITER]['isValid'] = (strlen($valid_authors[WRITER]['value']) > 2);
    if (!$valid_authors[WRITER]['isValid']) {
        $errMsg = $valid_authors[WRITER]['errMsg'] = 'Le scénariste est non valid!';
    }

    $valid_authors[ARTIST]['value'] = trim(filter_input(INPUT_POST, ARTIST, FILTER_SANITIZE_STRING));
    $valid_authors[ARTIST]['isValid'] = (strlen($valid_authors[ARTIST]['value']) > 2);
    if (!$valid_authors[ARTIST]['isValid']) {
        $errMsg = $valid_authors[ARTIST]['errMsg'] = 'Le déssinateur est non valid!';
    }

    foreach ($valid_authors as $fields) {
        if(!$fields['isValid']) {
            $isFormValid = false;
            break;
        }
    }
}

if (array_key_exists('create_submit', $_POST)) {
    if ($isFormValid) {
        add_author($valid_authors[WRITER]['value'], $valid_authors[ARTIST]['value']);
        header('Location: index.php');
        exit();
    }
} elseif (array_key_exists('edit_submit', $_POST)) {
    if ($isFormValid) {
        update_author($_GET['id'], $valid_authors[WRITER]['value'], $valid_authors[ARTIST]['value']);
        $isUpdated = true;
    }
} elseif (array_key_exists('delete_submit', $_POST)) {
    delete_author($_GET['id']);
    header('Location: index.php');
    exit();
} elseif (array_key_exists('close_submit', $_POST)) {
    header('Location: index.php');
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
    <?php foreach ($valid_authors as $fields) { ?>
        <p><?php echo $fields['errMsg']; ?></p>
    <?php } ?>
    </div>
<?php } ?>
    <div class="<?php echo ($isUpdated)?'alert alert-success':'' ?>">
        <p><?php echo ($isUpdated)?'Mis à jour avec succès':'' ?></p>
    </div>
<?php if ('edit' == $action) {
    $authors = get_authors($_GET['id']);
?>
<h2 class="sub-header">Auteurs - Modification</h2>
<form method="post" class="col-md-4">
    <div class="form-group">
        <label for="<?php echo AUTHOR_ID; ?>">ID: </label>
        <input id="<?php echo AUTHOR_ID; ?>" name="<?php echo AUTHOR_ID; ?>" type="text" class="form-control"
               value="<?php echo (array_key_exists('id', $_GET)) ? $authors[0][AUTHOR_ID] : '' ?>" disabled="disabled" />
    </div>
    <div class="form-group">
        <label for="<?php echo WRITER; ?>">Scénariste: </label>
        <input id="<?php echo WRITER; ?>" name="<?php echo WRITER; ?>" type="text" class="form-control"
               value="<?php echo (array_key_exists('id', $_GET)) ? $authors[0][WRITER] : '' ?>" />
    </div>
    <div class="form-group">
        <label for="<?php echo ARTIST; ?>">Déssinateur: </label>
        <input id="<?php echo ARTIST; ?>" name="<?php echo ARTIST; ?>" type="text" class="form-control"
               value="<?php echo (array_key_exists('id', $_GET)) ? $authors[0][ARTIST] : '' ?>" />
    </div>
    <button class="btn btn-warning" type="submit" name="edit_submit">Modifier</button>
    <button class="btn btn-default" type="submit" name="close_submit">Annuler</button>
</form>
<?php } elseif ('add' == $action) { ?>
    <h2 class="sub-header">Auteurs - Nouveaux</h2>
    <form method="post" class="col-md-4">
        <div class="form-group">
            <label for="<?php echo WRITER; ?>">Scénariste: </label>
            <input id="<?php echo WRITER; ?>" name="<?php echo WRITER; ?>" type="text" class="form-control"
                   value="<?php echo (array_key_exists(WRITER, $_POST)) ? $_POST[WRITER] : '' ?>" />
        </div>
        <div class="form-group">
            <label for="<?php echo ARTIST; ?>">Déssinateur: </label>
            <input id="<?php echo ARTIST; ?>" name="<?php echo ARTIST; ?>" type="text" class="form-control"
                   value="<?php echo (array_key_exists(ARTIST, $_POST)) ? $_POST[ARTIST] : '' ?>" />
        </div>
        <button class="btn btn-primary" type="submit" name="create_submit">Ajouter</button>
        <button class="btn btn-default" type="submit" name="close_submit">Annuler</button>
    </form>
<?php } elseif ('delete' == $action) { $authors = get_authors($_GET['id']); ?>
    <h2 class="sub-header">Auteurs - Supprimer</h2>
    <form method="post" class="col-md-4">
        <p>Êtes-vous sûr de vouloir supprimer définitivement
            le scénariste: <?php echo (array_key_exists('id', $_GET)) ? $authors[0][WRITER] : '' ?>
            et le déssinateur: <?php echo (array_key_exists('id', $_GET)) ? $authors[0][ARTIST] : '' ?> ?
        </p>
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
