<?php
require_once 'data/_data.php';
require_once 'data/_genres.php';
require_once 'data/_comics.php';

define('SUBMIT', 'submit');
$genres = get_genres();

if (array_key_exists(SUBMIT, $_GET)) {
    if (isset($_GET[P_GENRES]) && $_GET[P_GENRES] != '-1') {
        $comics = comics_genres($_GET[P_GENRES][0]);
    } else {
        $comics = get_comics();
    }
}
?>
<form class="form-inline" action="<?php echo PAGE_INDEX ?>">
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
</form>