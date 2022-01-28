<?php
namespace td1\models;

use \Illuminate\Database\Eloquent\Model ;
use \Illuminate\Database\Eloquent\ModelNotFoundException ;



class Carte extends Model {
 protected $table='carte';
 protected $primaryKey='id';



 public function commandes() {
    return $this->hasMany('td1\Commande', 'cmd_id');
 }
 public function getAll() {
     return Carte::select('nom_proprietaire', 'mail_proprietaire','cumul')
     ->orderBy('nom_proprietaire')
     ->get();
}
public function getByID($id) {
   try {
      $c = Carte::select('nom_proprietaire', 'mail_proprietaire','cumul')
      ->where('id','=',$id)
      ->firstOrFail();
   } catch (ModelNotFoundException $e) {
      echo 'Carte '.$id." n'existe pas", 1;
      return $c;
   }
}
}
