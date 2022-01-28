<?php

namespace td2;
require "../vendor/autoload.php";


use td2\Article;


/** Utilisation */
$a = new Article();

$liste = Article::all();

foreach( $liste as $article) {
    print $article->nom.' ';
}


$a->nom = "'velo'"; $a->tarif=273;$a->id_categ=1;
$a->insert();

$a->nom = "'tricycle'"; $a->tarif=6942;$a->id_categ=1;
$a->insert();

$liste = Article::all();
foreach( $liste as $article) {
    print $article->nom.' ';
}

$liste = $a->where('id','=','64');
foreach( $liste as $article) {
    print $article->nom.' ';
}