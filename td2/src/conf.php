<?php
namespace td2;
require "../vendor/autoload.php";

use pdo;
class Conf {


    /* Connect to a MySQL database using driver invocation */
    function getPDO() {
        $dsn = 'mysql:dbname=donneeweb;host=127.0.0.1;port=3308';
        $user = 'root';
        $password = 'root';
        $dbh = '';
        try { 
            $dbh = new PDO($dsn, $user, $password);
            //$dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            //echo "Connexion réussie";
        } catch (PDOException $error) {
            echo 'Échec de la connexion : ' . $error->getMessage();
        }
            return $dbh;
    }
}

?>