<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumRang extends Model {

	//
     protected $fillable = [

        'rang_nom'
    ];

     function getId() {
        return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
    }

    function getNom(){
        return (isset($this->attributes['rang_nom'])) ? $this->attributes['rang_nom'] : '';
    }
    
    function getDateCreation() {
        return (isset($this->attributes['created_at'])) ? $this->attributes['created_at'] : 0;
    }

    function getDateModification() {
        return (isset($this->attributes['updated_at'])) ? $this->attributes['updated_at'] : 0;
    }

    function setId($id) {
        $this->attributes['id'] = $id;
    }

    function setNom($nom) {
        $this->attributes['rang_nom'] = $nom;
    }
    
    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModification($dateModification) {
        $this->attributes['updated_at'] = Carbon::parse($dateModification);
    }
}
