<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumConfig extends Model {

	//
        protected $fillable = [
            
            'config_nom',
            'config_valeur'
        ];
        
        
        function getId() {
            return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
        }

        function getNom() {
            return (isset($this->attributes['config_nom'])) ? $this->attributes['config_nom'] : '';
        }

        function getValeur() {
            return (isset($this->attributes['config_valeur'])) ? $this->attributes['config_valeur'] : 0;
        }

        function getDateCreation() {
            return (isset($this->attributes['created_at'])) ? $this->attributes['created_at'] : new Carbon();
        }

        function getDateModification() {
            return (isset($this->attributes['updated_at'])) ? $this->attributes['updated_at'] : new Carbon();
        }

        function setId($id) {
            $this->attributes['id'] = $id;
        }

        function setNom($nom) {
            $this->attributes['config_nom'] = $nom;
        }

        function setValeur($valeur) {
            $this->attributes['config_valeur'] = $valeur;
        }

        function setDateCreation($dateCreation) {
            $this->attributes['created_at'] = Carbon::parse($dateCreation);
        }

        function setDateModification($dateModification) {
            $this->attributes['updated_at'] = Carbon::parse($dateModification);
        }


}
