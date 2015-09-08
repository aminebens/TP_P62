<?php
define('SITE_NAME', 'ComicsDB');
define('IMG_PLACE_HOLDER', 'images/couv/place_holder.png');
define('MAX_NOTE', 10);

// Paramétres pour get
define('PAGE_INDEX', 'index.php');
define('P_GENRES', 'genres');

// Modal login
define('LOGIN', 'login');
define('EMAIL', 'email');
define('PASS', 'pass');

//Modal sign
define('SIGN_UP' , 'sign_up');
define('FIRST_NAME', 'first_name');
define('LAST_NAME', 'last_name');
// ** email and password already defined in "modal login" **
define('PASS_CONFIRM', 'pass_confirm');
define('PHONE', 'phone');
define('GENDER', 'gender');
define('MALE', 'male');
define('FEMALE', 'female');
define('DOB', 'date_birth');

// comics TB columns
define('ITEM_ID', 'comic_id');
define('ITEM_TITLE', 'title');
define('ITEM_PRICE', 'price');
define('ITEM_COVER', 'cover_img_path');
define('ITEM_DESC', 'description');
define('ITEM_ISBN', 'isbn');
define('ITEM_RATING', 'rating');
define('ITEM_P_DATE', 'publishing_date');

// authors TB columns
define('AUTHOR_ID', 'author_id');
define('WRITER', 'Writer');
define('ARTIST', 'Artist');

// genres TB columns
define('GENRE_ID', 'genre_id');
define('GENRE_NAME', 'name');