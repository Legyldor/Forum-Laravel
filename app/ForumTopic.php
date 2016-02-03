<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumTopic extends Model {

    //

    protected $fillable = [

        'forum_id',
        'topic_titre',
        'topic_createur',
        'topic_vu',
        'topic_time',
        'topic_genre',
        'topic_last_post',
        'topic_first_post',
        'topic_post',
        'topic_locked'
    ];

    function getId() {
        return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
    }

    function getForumId() {
        return (isset($this->attributes['forum_id'])) ? $this->attributes['forum_id'] : 0;
    }

    function getTitre() {
        return (isset($this->attributes['topic_titre'])) ? $this->attributes['topic_titre'] : '';
    }

    function getCreateurId() {
        return (isset($this->attributes['user_id'])) ? $this->attributes['user_id'] : 0;
    }

    function getNbVu() {
        return (isset($this->attributes['topic_vu'])) ? $this->attributes['topic_vu'] : 0;
    }

    function getGenreId() {
        return (isset($this->attributes['topic_genre'])) ? $this->attributes['topic_genre'] : 0;
    }

    function getLastPostId() {
        return (isset($this->attributes['topic_last_post'])) ? $this->attributes['topic_last_post'] : 0;
    }

    function getFirstPostId() {
        return (isset($this->attributes['topic_first_post'])) ? $this->attributes['topic_first_post'] : 0;
    }

    function getNbPost() {
        return (isset($this->attributes['topic_post'])) ? $this->attributes['topic_post'] : 0;
    }

    function getVerrouille() {
        return (isset($this->attributes['topic_locked'])) ? $this->attributes['topic_locked'] : 0;
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

    function setForumId($forumId) {
        $this->attributes['forum_id'] = $forumId;
    }

    function setTitre($titre) {
        $this->attributes['topic_titre'] = $titre;
    }

    function setCreateurId($createurId) {
        $this->attributes['user_id'] = $createurId;
    }

    function setNbVu($nbVu) {
        $this->attributes['topic_vu'] = $nbVu;
    }

    function setGenreId($genre) {
        $this->attributes['topic_genre'] = $genre;
    }

    function setLastPostId($lastPostId) {
        $this->attributes['topic_last_post'] = $lastPostId;
    }

    function setFirsPostId($firsPostId) {
        $this->attributes['topic_first_post'] = $firsPostId;
    }

    function setNbPost($nbPost) {
        $this->attributes['topic_post'] = $nbPost;
    }

    function setVerrouille($verrouille) {
        $this->attributes['topic_locked'] = $verrouille;
    }

    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModification($dateModification) {
        $this->attributes['updated_at'] = Carbon::parse($dateModification);
    }

    function forum() {
        return $this->belongsTo('App\ForumForum');
    }

    function getForum() {
        return $this->forum()->get();
    }

    function posts() {
        return $this->hasMany('App\ForumPost');
    }

    function getPosts() {
        return $this->posts()->get();
    }

    function createur() {
        return $this->belongsTo('App\User', 'user_id');
    }

    function getCreateur() {
        return $this->createur()->get();
    }
    
    function genre(){
        return $this->belongsTo('App\ForumGenre', 'topic_genre');
    }
    
    function getGenre(){
        return $this->genre()->get();
    }
}
