<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategorie extends Model {

	//
        protected $fillable = [
            
            'cat_nom',
            'cat_ordre',
            'cat_url_header'
        ];
        
        function getId() {
            return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
        }

        function getNom() {
            return (isset($this->attributes['cat_nom'])) ? $this->attributes['cat_nom'] : '';
        }

        function getOrdre() {
            return (isset($this->attributes['cat_ordre'])) ? $this->attributes['cat_ordre'] : 0;
        }
        
        function getURLHeader(){
            return (isset($this->attributes['cat_url_header'])) ? $this->attributes['cat_url_header'] : "default_header.png";
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
        
        function setURLHeader($header){
            $this->attributes['cat_url_header'] = $header;
        }

        function setNom($nom) {
            $this->attributes['cat_nom'] = $nom;
        }

        function setOrdre($ordre) {
            $this->attributes['cat_ordre'] = $ordre;
        }

        function setDateCreation($dateCreation) {
            $this->attributes['created_at'] = Carbon::parse($dateCreation);
        }

        function setDateModification($dateModification) {
            $this->attributes['updated_at'] = Carbon::parse($dateModification);
        }
        
        function forums(){
            return $this->hasMany('App\ForumForum');
        }
        
        function getForums(){
            return $this->forums()->get();
        }
}
