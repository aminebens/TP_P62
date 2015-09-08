<?php
// TODO: Check user login
require_once 'data/_user.php';
//var_dump($_POST);
//var_dump($_SESSION);

$is_valid_user = false;

if ( array_key_exists('submit', $_POST) ) {
    if ( isset($_POST[EMAIL]) && isset($_POST[PASS]) ) {
        $is_valid_user = authenticate_user($_POST[EMAIL], $_POST[PASS]);
        //var_dump($is_valid_user);
        if ($is_valid_user) {
            $_SESSION[FIRST_NAME] = $is_valid_user[FIRST_NAME];
            header('Location: index.php');
        }
    }
}

?>
<!-- Modal -->
<div class="modal fade" id="<?php echo LOGIN; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Connexion</h4>
            </div>
            <div class="modal-body">
                <form name="form_login" method="post">
                    <div class="form-group">
                        <label for="<?php echo EMAIL; ?>">Email:</label>
                        <input id="<?php echo EMAIL; ?>" name="<?php echo EMAIL; ?>" type="text" placeholder="Entrer votre email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo PASS; ?>">Mot de passe:</label>
                        <input id="<?php echo PASS; ?>" name="<?php echo PASS; ?>" type="password" placeholder="Entrer votre mot de passe" class="form-control" />
                    </div>
                    <input type="submit" name="submit" value="Se connecter" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>