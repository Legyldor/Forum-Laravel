<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model {

    //
    protected $fillable = [

        'post_createur',
        'post_texte',
        'post_time',
        'topic_id',
        'post_forum_id'
    ];

    function getId() {
        return (isset($this->attributes['id'])) ? $this->attributes['id'] : 0;
    }

    function getCreateurId() {
        return (isset($this->attributes['user_id'])) ? $this->attributes['post_createur'] : 0;
    }

    function getTexte() {
        return (isset($this->attributes['post_texte'])) ? $this->attributes['post_texte'] : '';
    }

    function getTopicId() {
        return (isset($this->attributes['forum_topic_id'])) ? $this->attributes['topic_id'] : 0;
    }

    function getForumId() {
        return (isset($this->attributes['post_forum_id'])) ? $this->attributes['post_forum_id'] : 0;
    }

    function getDateCreation() {
        return (isset($this->attributes['created_at'])) ? $this->attributes['created_at'] : 0;
    }

    function getDateModification() {
        return (isset($this->attributes['updated_at'])) ? $this->attributes['updated_at'] : 0;
    }
    
    function getIsDelete(){
        return (isset($this->attributes['post_is_delete'])) ? $this->attributes['post_is_delete'] : 0;
    }

    function setId($id) {
        $this->attributes['id'] = $id;
    }

    function setCreateurId($createurId) {
        $this->attributes['user_id'] = $createurId;
    }

    function setTexte($texte) {
        $this->attributes['post_texte'] = $texte;
    }

    function setTopicId($topicId) {
        $this->attributes['forum_topic_id'] = $topicId;
    }

    function setForumId($forumId) {
        $this->attributes['post_forum_id'] = $forumId;
    }

    function setDateCreation($dateCreation) {
        $this->attributes['created_at'] = Carbon::parse($dateCreation);
    }

    function setDateModification($dateModification) {
        $this->attributes['updated_at'] = Carbon::parse($dateModification);
    }
    
    function setIsDelete($isdelete){
        $this->attributes['post_is_delete'] = $isdelete;
    }
    
    function createur(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    function getCreateur(){
        return $this->createur()->get();
    }
    
    function topic(){
        return $this->belongsTo('App\ForumTopic');
    }
    
    function getTopic(){
        return $this->topic()->get();
    }
    
    function forum(){
        return $this->belongsTo('App\ForumForum');
    }
    
    function getForum(){
        return $this->forum()->get();
    }
}
