<?php
namespace td2;
require "../vendor/autoload.php";

class Article {
    private $id, $nom, $description, $tarif, $stock;
    public function __construct( array $t=null) {
        /* initialiser les attributs */
    }

    public static function findById(Int $id) : Article {
        $pdo= new \PDO('dsn', 'user', 'pass');
        $sql = 'select * from article where id= ?';
        $stmt=$pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        if ($stmt->execute()) {
            $article_data = $stmt->fetch(\PDO::FETCH_ASSOC);
            return new \models\Article( $article_data );
        } else return null;
    }


    private function insert() : int {
        $sql= 'insert into article(`nom`,`descr`,`tarif`,`stock`) values (?,?,?,?)';
        /* … */
    }
    private function update() : int {
        $sql = 'update article set .... where id= ?';
    }
    private function delete() : int {
        $sql = 'delete from article where id= ?';
    }
    public function estDisponible() : bool {
        return ($this->stock > 0) ;
    }
    public function modifierStock($nb) : Int {
        $this->stock += $nb;
        $this->update();
    }
}