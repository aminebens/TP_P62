<?php
require_once 'data/_data.php';
require_once 'data/_genres.php';
require_once 'data/_comics.php';

define('SUBMIT', 'submit');
$genres = get_genres();

if (array_key_exists(SUBMIT, $_GET)) {
    if (isset($_GET[P_GENRES])) {
        $comics = comics_genres($_GET[P_GENRES][0]);
        //var_dump($_GET);
    }
}
?>


<!--Genre && search form-->
<form class="form-inline" action="<?php echo PAGE_INDEX ?>">
    <div class="form-group col-md-3">
        <input type="text" name="<?php echo P_INPUT_SEARCH; ?>" class="form-control" placeholder="Search" />
        <input type="submit" name="<?php echo NAV_SEARCH; ?>" class="btn btn-default" value="Rechercher" />
    </div>
    <div class="form-group col-md-4">
        <label for="genres_list">Genres:</label>
        <select id="genres_list" name="<?php echo P_GENRES; ?>" class="form-control" >
            <option value="-1">choisir ...</option>
            <?php foreach ($genres as $genre) { ?>
                <option value="<?php echo $genre[GENRE_ID] ?>" <?php
                echo ( array_key_exists(P_GENRES, $_GET) && ($genre[GENRE_ID] == $_GET[P_GENRES]) ) ? 'selected=selected' : '';
                ?>><?php echo $genre[GENRE_NAME] ?></option>
            <?php } ?>
        </select>
        <input class="btn btn-info" type="submit" name="<?php echo SUBMIT; ?>" value="Soumettre" />
    </div>
</form>