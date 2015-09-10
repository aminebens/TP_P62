<?php
define('SITE_NAME', 'ComicsDB');
define('IMG_PLACE_HOLDER', 'images/couv/place_holder.png');
define('MAX_NOTE', 5);

// Paramétres pour get
define('PAGE_INDEX', 'index.php');
define('P_GENRES', 'genres');

// login
define('LOGIN', 'login');
define('LOGOUT', 'logout');
define('EMAIL', 'email');
define('PASS', 'pass');

// sign up
define('U_ID', 'user_id');
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
define('STREET_NUM','street_num');
define('STREET','street');
define('CITY','city');
define('PROVINCE','province');
define('ZIP','postal_code');

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

// publishers TB columns
define('PUBLISHER_ID', 'publisher_id');
define('PUBLISHER_NAME', 'name');

// Shopping cart
define('ADD_TO_CART' , 'add');
define('SESS_CART', 'sess_cart');
define('SESS_CART_TOTAL', 'sess_cart_total');
define('P_ADD_TO_CART', 'adToCart');
define('P_REMOVE_FROM_CART', 'rvFromCart');