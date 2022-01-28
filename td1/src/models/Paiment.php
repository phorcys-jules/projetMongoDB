<?php
namespace models;

class Paiment extends \Illuminate\Database\Eloquent\Model {
 protected $table='Paiment';
 protected $primaryKey='id';

 public function commande() {
    return $this->belongsTo('td1\Commande','lieu_id');
 }
}