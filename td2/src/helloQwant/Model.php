<?php

namespace td2\helloQwant;
require "../vendor/autoload.php";

class Model {
    protected static $table;
    protected static $idColumn = 'id';
    protected $_v = [];

    public function __construct(array $t = null) {
        if (!is_null($t)) $this->_v = $t;
    }
    public function __get(string $name) {
        if (array_key_exists($name, $this->_v))
        return $this->_v[$name];
    }
    public function __set(string $name, $val) : void {
        $this->_v[$name] = $val;
    }
    public function delete() {
        /* … */
        return Query::table(static::$table)
         ->where( static::$idColumn, '=', $this->_v[static::$idColumn] )
         ->delete();
    }

    public function insert() {
        return Query::table(static::$table)
         ->insert($this->_v);
    }

    public function where($field, $comparator, $value) {
        return Query::table(static::$table)
         ->where($field, $comparator, $value);
    }

    public function select() {
        /* … */
        return Query::table(static::$table)
         ->where( static::$idColumn, '=', $this->_v[static::$idColumn] )
         ->select();
    }

    public static function all() : array {
        $all = Query::table(static::$table)->get();
        $return=[];
        foreach( $all as $m) {
            $return[] = new static($m);
        }
        return $return;
    }
       

}