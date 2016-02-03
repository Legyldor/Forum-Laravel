<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumForum extends Model {

    //
    protected $fillable = [
        'forum_cat_id',
        'forum_name',
        'forum_desc',
        'forum_ordre',
        'forum_last_post_id',
        'forum_topic',
        'forum_post',
        'auth_view',
        'auth_post',
        'auth_topic',
        'auth_annonce',
        'auth_modo',
    ];

    function getId() {
        return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
    }

    function getCategorieId() {
        return (isset($this->attributes['forum_cat_id'])) ? $this->attributes['forum_cat_id'] : 0;
    }

    function getNom() {
        return (isset($this->attributes['forum_name'])) ? $this->attributes['forum_name'] : '';
    }

    function getDescription() {
        return (isset($this->attributes['forum_desc'])) ? $this->attributes['forum_desc'] : '';
    }

    function getOrdre() {
        return (isset($this->attributes['forum_ordre'])) ? $this->attributes['forum_ordre'] : 0;
    }

    function getLastPostId() {
        return (isset($this->attributes['forum_last_post_id'])) ? $this->attributes['forum_last_post_id'] : 0;
    }

    function getNbTopic() {
        return (isset($this->attributes['forum_topic']))? $this->attributes['forum_topic'] : 0;
    }

    function getNbPost() {
        return (isset($this->attributes['forum_post']))? $this->attributes['forum_post'] : 0;
    }

    function getPermissionVoir() {
        return (isset($this->attributes['auth_view']))? $this->attributes['auth_view'] : 0;
    }

    function getPermissionPost() {
        return (isset($this->attributes['auth_post']))? $this->attributes['auth_post'] : 0;
    }

    function getPermissionTopic() {
        return (isset($this->attributes['auth_topic']))? $this->attributes['auth_topic'] : 0;
    }

    function getPermissionAnnonce() {
        return (isset($this->attributes['auth_annonce']))? $this->attributes['auth_annonce'] : 0;
    }

    function getPermissionModerer() {
        return (isset($this->attributes['auth_modo']))? $this->attributes['auth_modo'] : 0;
    }

    function getDateCreation() {
        return (isset($this->attributes['created_at']))? $this->attributes['created_at'] : new Carbon();
    }

    function getDateModifiation() {
        return (isset($this->attributes['updated_at']))? $this->attributes['updated_at'] : new Carbon();
    }

    function setId($id) {
        $this->attributes['id'] = $id;
    }

    function setCategorieId($categorieId) {
        $this->attributes['forum_cat_id'] = $categorieId;
    }

    function setNom($nom) {
        $this->attributes['forum_name'] = $nom;
    }

    function setDescription($description) {
        $this->attributes['forum_desc'] = $description;
    }

    function setOrdre($ordre) {
        $this->attributes['forum_ordre'] = $ordre;
    }

    function setLastPostId($lastPostId) {
        $this->attributes['forum_last_post_id'] = $lastPostId;
    }

    function setNbTopic($nbTopic) {
        $this->attributes['forum_topic'] = $nbTopic;
    }

    function setNbPost($nbPost) {
        $this->attributes['forum_post'] = $nbPost;
    }

    function setPermissionVoir($permissionVoir) {
        $this->attributes['auth_view'] = $permissionVoir;
    }

    function setPermissionPost($permissionPost) {
        $this->attributes['auth_post'] = $permissionPost;
    }

    function setPermissionTopic($permissionTopic) {
        $this->attributes['auth_topic'] = $permissionTopic;
    }

    function setPermissionAnnonce($permissionAnnonce) {
        $this->attributes['auth_annonce'] = $permissionAnnonce;
    }

    function setPermissionModerer($permissionModerer) {
        $this->attributes['auth_modo'] = $permissionModerer;
    }

    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModifiation($dateModifiation) {
        $this->attributes['updated_at'] = Carbon::parse($dateModifiation);
    }
    
    function categorie(){
        return $this->belongsTo('App\ForumCategorie');
    }
    
    function getCategorie(){
        return $this->categorie()->get();
    }
    
    function topics(){
        return $this->hasMany('App\ForumTopic');
    }
    
    function getTopics(){
        return $this->topics()->get();
    }
    
    function posts(){
        return $this->hasMany('App\ForumPost');
    }
    
    function getPosts(){
        return $this->posts()->get();
    }
    
    function lastPost(){
        return $this->hasOne('App\ForumPost');
    }
    
    function getLastPost(){
        return $this->lastPost()->get();
    }

}
