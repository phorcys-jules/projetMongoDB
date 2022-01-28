<?php
namespace models;
use \Illuminate\Database\Eloquent\Model ;


class Commande extends Model {
 protected $table='Commande';
 protected $primaryKey='id';


 public function paiment() {
    return $this->belongsTo('td1\Paiment','lieu_id');
 }

 public function items() {
    return $this-> belongsToMany('td1\Item',
        'ligne', //table pivot
        'cmd_id',
        'item_id');
 }

}
/*
 public function items() {
    return $this->hasMany('tikenet\Seance', 'spect_id')
 }
 */