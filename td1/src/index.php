<?php
namespace td1;
require "../vendor/autoload.php";

use  Illuminate\Database\Capsule\Manager as DB;
use td1\database\Eloquent as Eloquent;
use td1\models\Carte;

$db = new DB();
//print ("eloquent installé".'<br>');
$db->setAsGlobal();
$db->bootEloquent();
Eloquent::start(__DIR__.'/../conf/conf.ini.dist');
//print ("Eloquent démarré, connecté a la base".'<br>');

$c = new Carte;
//echo $c->getAll();
echo $c->getByID(1);
echo $c->getByID(7342);
