<?php

namespace td2\helloQwant;
require "../vendor/autoload.php";

use td2\conf;


class Query {

    
    private $sqltable;
    private $fields = '*';
    private $where = null;
    private $args = [];
    private $sql = '';

    public function exSQL() : Array{
        $pdo = new Conf;
        $pdo = $pdo->getPDO();
        //$pdo = $dbh;
        $stmt = $pdo->prepare($this->sql);
        $stmt->execute($this->args);
        echo '<br>' . $this->sql .' : ';
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function table( string $table) : Query {
        $query = new Query;
        $query->sqltable= $table;
        //print_r($query);
        return $query;
    }

    public function select( array $fields) : Query {
        $this->fields = implode( ',', $fields);
        return $this;
    }


    public function where(string $col, string $op, $val) : Array {
        $this->args[]=$val;
        return $this->exSQL();
    }
    
    /**
     * génère la requête complète et l'exécute
     */
    public function get() : Array {
        $this->sql = 'select '. $this->fields .' from ' . $this->sqltable;
        /* … 
        $pdo = new Conf;
        $pdo = $pdo->getPDO();
        //$pdo = $dbh;
        $stmt = $pdo->prepare($this->sql);
        $stmt->execute($this->args);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        */
        /*
        //if params
                    foreach ($this->$params as $key => $value) {
                $this->where($this->$col, $this->$op, $value);
            }
        */
        return $this->exSQL();
    }

    public function delete() : Array {
        $this->sql = 'delete '.' from ' . $this->sqltable;
        foreach ($this->$params as $key => $value) {
            $this->where($this->$col, $this->$op, $value);
        }
        return $this->exSQL();
    }

    public function insert($arg) : Array {
        $this->sql = 'Insert '.' into ' . $this->sqltable;
        $this->sql .= " (" . implode(', ', array_keys($arg)) . ")";
        $this->sql .= " VALUES (". implode(', ', array_values($arg)) . ")";
        return $this->exSQL();
    }


}