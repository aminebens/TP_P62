<?php
    // Initialise code here
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
                        <input id="<?php echo LOGIN; ?>" name="<?php echo LOGIN; ?>" type="text" placeholder="Entrer votre email" class="form-control" />
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