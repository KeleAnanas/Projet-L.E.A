<?php
// Informations d'identification
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'thermoiot');
define('DB_PORT', '3308');

// Connexion à la base de données MySQL
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Vérifier la connexion
if($conn ->connect_error){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

