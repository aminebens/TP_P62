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
<form class="form-inline" action="<?php echo PAGE_INDEX ?>">
    <label for="genres_list">Genres:</label>
    <select id="genres_list" name="<?php echo P_GENRES; ?>" class="form-control" >
        <option value="-1">choisir ...</option>
        <?php foreach ($genres as $genre) { ?>
            <option value="<?php echo $genre[GENRE_ID] ?>"><?php echo $genre[GENRE_NAME] ?></option>
        <?php } ?>
    </select>
    <input class="btn btn-info" type="submit" name="<?php echo SUBMIT; ?>" value="Soumettre" />
</form>