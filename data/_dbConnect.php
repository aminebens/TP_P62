<?php
require_once('_dbDefines.php');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
if ($mysqli->connect_errno) {
    echo "Erreur lors de la connexion à MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (!$mysqli->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
}
echo $mysqli->host_info . "\n";