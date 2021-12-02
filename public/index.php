<?php
/**
 * Created by PhpStorm.
 * User: canals5
 * Date: 28/10/2019
 * Time: 16:16
 */

require_once "../src/vendor/autoload.php" ;

$c = new \MongoDB\Client("mongodb://mongo");
echo "connected to mongo <br>";

