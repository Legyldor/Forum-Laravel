<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable,
        CanResetPassword;

    protected $table = 'users';
    //
    protected $fillable = [

        'pseudo',
        'email',
        'password',
        'siteweb',
        'avatar',
        'signature',
        'localisation',
        'inscrit',
        'derniere_visite',
        'rang',
        'post'
    ];

    function getId() {
        return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
    }

    function getPseudo() {
        return (isset($this->attributes['pseudo'])) ? $this->attributes['pseudo'] : '';
    }

    function getEmail() {
        return (isset($this->attributes['email'])) ? $this->attributes['email'] : '';
    }

    function getPassword() {
        return (isset($this->attributes['password'])) ? $this->attributes['password'] : '';
    }

    function getSiteweb() {
        return (isset($this->attributes['siteweb'])) ? $this->attributes['siteweb'] : '';
    }

    function getAvatar() {
        return (isset($this->attributes['avatar'])) ? $this->attributes['avatar'] : 'default_avatar.png';
    }

    function getSignature() {
        return (isset($this->attributes['signature'])) ? $this->attributes['signature'] : '';
    }

    function getLocalisation() {
        return (isset($this->attributes['localisation'])) ? $this->attributes['localisation'] : '';
    }

    function getDateInscription() {
        return (isset($this->attributes['inscrit'])) ? $this->attributes['inscrit'] : Carbon::now();
    }

    function getDateLastVisite() {
        return (isset($this->attributes['derniere_visite'])) ? $this->attributes['derniere_visite'] : 0;
    }

    function getRangId() {
        return (isset($this->attributes['rang'])) ? $this->attributes['rang'] : 0;
    }

    function getNbPost() {
        return (isset($this->attributes['post'])) ? $this->attributes['post'] : 0;
    }

    function getDateCreation() {
        return (isset($this->attributes['created_at'])) ? $this->attributes['created_at'] : Carbon::now();
    }

    function getDateModification() {
        return (isset($this->attributes['updated_at'])) ? $this->attributes['updated_at'] : Carbon::now();
    }
    
    function getDateSuppression() {
        return (isset($this->attributes['deleted_at'])) ? $this->attributes['deleted_at'] : new Carbon();
    }

    function setId($id) {
        $this->attributes['id'] = $id;
    }

    function setPseudo($pseudo) {
        $this->attributes['pseudo'] = $pseudo;
    }

    function setEmail($email) {
        $this->attributes['email'] = $email;
    }

    function setPassword($password) {
        $this->attributes['password'] = $password;
    }

    function setSiteweb($siteweb) {
        $this->attributes['siteweb'] = $siteweb;
    }

    function setAvatar($avatar) {
        $this->attributes['avatar'] = $avatar;
    }

    function setSignature($signature) {
        $this->attributes['signature'] = $signature;
    }

    function setLocalisation($localisation) {
        $this->attributes['localisation'] = $localisation;
    }

    function setDateInscription($dateInscription) {
        $this->attributes['inscrit'] = Carbon::parse($dateInscription);
    }

    function setDateLastVisite($dateLastVisite) {
        $this->attributes['derniere_visite'] = Carbon::parse($dateLastVisite);
    }

    function setRangId($rang) {
        $this->attributes['rang'] = $rang;
    }

    function setNbPost($nbPost) {
        $this->attributes['post'] = $nbPost;
    }

    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModification($dateModification) {
        $this->attributes['updated_at'] = Carbon::parse($dateModification);
    }
    
    function setDateSuppression($dateSuppression) {
        $this->attributes['deleted_at'] = Carbon::parse($dateSuppression);
    }

    protected $hidden = ['password', 'remember_token'];
    
    function posts(){
        return $this->hasMany('App\ForumPost');
    }
    
    function getPosts(){
        return $this->posts()->get();
    }
    
    function topics(){
        return $this->hasMany('App\ForumTopic');
    }
    
    function getTopics(){
        return $this->topics()->get();
    }
    
    function rang(){
        return $this->belongsTo('App\ForumRang', 'rang');
    }
    
    function getRang(){
        return $this->rang()->get();
    }
    

}
