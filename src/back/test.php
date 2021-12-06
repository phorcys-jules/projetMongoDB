<?php

require_once "./vendor/autoload.php" ;
//"mongodb://root:rootpassword@localhost:27017"

$c = new \MongoDB\Client();
echo "connected to mongo <br>";

foreach ($c->listDatabases() as $databaseInfo) {
   var_dump($databaseInfo);
}

// select a database
$db = $c->firstmongodb;

echo "Database firstmongodb selected <br>";

/*
$collection = $db->createCollection("mycol4");
echo "Collection created succsessfully <br>";
*/
$collection = $db->mycol;


$document = array( 
    "title" => "truc", 
    "description" => "database", 
    "likes" => 100,
    "url" => "http://www.tutorialspoint.com/mongodb/",
    "by" => "tutorials point"
 );

$collection->insertOne($document);
echo "Document inserted successfully<br>";

$cursor = $collection->find();
// iterate cursor to display title of documents
 
foreach ($cursor as $document) {
   echo $document["title"] . "<br>";
}