<?php
require_once 'models\Carte.php' ;
use \models\Carte;
$c = new Carte;
echo $c->getAll();