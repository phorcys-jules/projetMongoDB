<?php

require_once "./vendor/autoload.php" ;
//"mongodb://root:rootpassword@localhost:27017"

$c = new \MongoDB\Client();
echo "connected to mongo <br>";

// select a database
$db = $c->firstmongodb;

echo "Database firstmongodb selected <br>";

/*
$collection = $db->createCollection("mycol4");
echo "Collection created succsessfully <br>";
*/
$collection = $db->mycol;

$document = array( 
    "title" => "MongoDB", 
    "description" => "database", 
    "likes" => 100,
    "url" => "http://www.tutorialspoint.com/mongodb/",
    "by" => "tutorials point"
 );

$collection->insert($document);
echo "Document inserted successfully";

$cursor = $collection->find();
// iterate cursor to display title of documents
 
foreach ($cursor as $document) {
   echo $document["title"] . "\n";
}