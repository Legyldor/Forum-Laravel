<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumMp extends Model {

	//

     protected $fillable = [

        'mp_expediteur',
        'mp_destinataire',
        'mp_titre',
        'mp_texte',
        'mp_time',
        'mp_lu'
    ];
    
    function getId() {
        return (isset($this->attributes['id']))  ? $this->attributes['id'] : 0;
    }

    function getExpediteurId() {
        return (isset($this->attributes['mp_expediteur']))  ? $this->attributes['mp_expediteur'] : 0;
    }

    function getDestinataireId() {
        return (isset($this->attributes['mp_destinataire']))  ? $this->attributes['mp_destinataire'] : 0;
    }

    function getTitre() {
        return (isset($this->attributes['mp_titre']))  ? $this->attributes['mp_titre'] : '';
    }

    function getMessage() {
        return (isset($this->attributes['mp_texte']))  ? $this->attributes['mp_texte'] : '';
    }

    function getDateEnvoi() {
        return (isset($this->attributes['mp_time'])) ? $this->attributes['mp_time'] : new Carbon();
    }

    function getIsLu() {
        return (isset($this->attributes['mp_lu'])) ? $this->attributes['mp_lu'] : 0;
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

    function setExpediteurId($expediteurId) {
        $this->attributes['mp_expediteur'] = $expediteurId;
    }

    function setDestinataireId($destinataireId) {
        $this->attributes['mp_destinataire'] = $destinataireId;
    }

    function setTitre($titre) {
        $this->attributes['mp_titre'] = $titre;
    }

    function setMessage($message) {
        $this->attributes['mp_texte'] = $message;
    }

    function setDateEnvoi($dateEnvoi) {
        $this->attributes['mp_time'] = Carbon::parse($dateEnvoi);
    }

    function setIsLu($isLu) {
        $this->attributes['mp_lu'] = $isLu;
    }

    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModification($dateModification) {
        $this->attributes['updated_at'] = Carbon::parse($dateModification);
    }
    
    function destinataire(){
        return $this->belongsTo('App\User');
    }    

    function getDestinataire(){
        return $this->destinataire()->get();
    }
    
    function expediteur(){
        return $this->belongsTo('App\User');
    }
    
    function getExpediteur(){
        return $this->expediteur()->get();
    }

}
