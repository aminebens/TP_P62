<?php
var_dump($_POST);
if(array_key_exists('submit', $_POST)){

}
?>


<!-- Modal -->
<div class="modal fade" id="<?php echo SIGN_UP; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Inscription</h4>
            </div>
            <p>Veuillez remplir les informations ci-dessous:</p>
            <div class="modal-body">
                <form name="form_login" method="post">
                    <div class="form-group">
                        <label for="<?php echo MALE; ?>">Homme:</label>
                        <input id="<?php echo MALE; ?>" name="<?php echo GENDER; ?>" type="radio" value="<?php echo MALE ?>" class="form-control" />
                        <label for="<?php echo FEMALE; ?>">Femme:</label>
                        <input id="<?php echo FEMALE; ?>" name="<?php echo GENDER; ?>" type="radio" value="<?php echo FEMALE ?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo FIRST_NAME; ?>">Prénom:</label>
                        <input id="<?php echo FIRST_NAME; ?>" name="<?php echo FIRST_NAME; ?>" type="text" placeholder="Entrer votre prénom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo LAST_NAME; ?>">Nom:</label>
                        <input id="<?php echo LAST_NAME; ?>" name="<?php echo LAST_NAME; ?>" type="text" placeholder="Entrer votre nom" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo DOB; ?>">Date de naissance:</label>
                        <input id="<?php echo DOB; ?>" name="<?php echo DOB; ?>" type="date" placeholder="AAAA-MM-DD" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo EMAIL; ?>">Email:</label>
                        <input id="<?php echo EMAIL; ?>" name="<?php echo EMAIL; ?>" type="email" placeholder="Entrer votre email" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo PASS; ?>">Mot de passe:</label>
                        <input id="<?php echo PASS; ?>" name="<?php echo PASS; ?>" type="password" placeholder="Entrer votre mot de passe" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="<?php echo PASS_CONFIRM; ?>">Confirmez mot de passe:</label>
                        <input id="<?php echo PASS_CONFIRM; ?>" name="<?php echo PASS_CONFIRM; ?>" type="password" placeholder="Confirmez votre mot de passe" class="form-control" />
                    </div>
                    <input type="submit" name="submit" value="Inscription" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>
