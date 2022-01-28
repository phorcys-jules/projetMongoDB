<?php
$dsn = 'mysql:dbname=donneeweb;host=127.0.0.1;port=3308';
$user = 'root';
$password = 'root';


// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
    $dbh = new PDO($dsn, $user, $password);
  echo "Connexion réussie";
} catch (PDOException $error) {
  echo 'Échec de la connexion : ' . $error->getMessage();
}