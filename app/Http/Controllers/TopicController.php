<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\ForumTopic;
use App\ForumForum;
use App\ForumPost;
use App\ForumGenre;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller {

    function __construct() {
        $this->middleware('authview', ['only' => 'index']);
        $this->middleware('authtopic', ['only' => 'create']);
        $this->middleware('authmodo', ['only' => 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($idForum) {
        $ajouter = false;
        $forum = ForumForum::findOrFail($idForum);
        $topics = ForumTopic::where('forum_id', '=', $idForum)->orderBy('topic_genre', 'desc')->paginate(10);
        $lastPosts = array();
        $firstPosts = array();
        
        foreach ($topics as $topic){
            $lastPost = ForumPost::findOrFail($topic->getLastPostId());
            array_push($lastPosts, $lastPost);
            $firstPost = ForumPost::findOrFail($topic->getFirstPostId());
            array_push($firstPosts, $firstPost);
        }
        // tester autorisation d'ajout
        if(Auth::user() != NULL){
            if(Auth::user()->rang()->first()->getId() >= $forum->getPermissionTopic()){

                $ajouter = true;

            }
        }
        return view('forum.topics')->with(compact('topics', 'forum', 'lastPosts', 'firstPosts', 'ajouter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($idForum) {
        //
        $genres = ForumGenre::all()->lists('genre_nom', 'id');
        
        
        return view('forum.createTopic')->with(compact('genres', 'idForum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($idForum, TopicRequest $request) {
        //
        
        $topic = new ForumTopic;
        $post = new ForumPost;
        
        $topic->setForumId($idForum);
        $topic->setTitre($request->input('topic_titre'));
        $topic->setNbVu(0);
        $topic->setNbPost(0);
        $topic->setVerrouille(false);
        $topic->setGenreId($request->input('topic_genre'));
        
        $post->setTexte($request->input('post_texte'));
        $post->setForumId($idForum);

        Auth::user()->topics()->save($topic);
        
        $post->setTopicId($topic->getId());
        
        Auth::user()->posts()->save($post);
        
        $topic->setFirsPostId($post->getId());
        $topic->setLastPostId($post->getId());
        
        $topic->save();
        
        
        return redirect('forum/'. $idForum .'/topic');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($idForum, $id) {
        //
        return redirect('forum/'.$idForum.'/topic/'. $id .'/post');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($idForum, $id) {
        //
        $topic = ForumTopic::findOrFail($id);
        $genres = ForumGenre::all()->lists('genre_nom', 'id');
        return view('forum.editTopic')->with(compact('topic', 'genres', 'idForum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($idForum, $id, TopicRequest $request) {
        //
        $topic = ForumTopic::findOrFail($id);
        
        $topic->setTitre($request->input('topic_titre'));
        $topic->setGenreId($request->input('topic_genre'));

        $topic->save();
        
        return redirect('forum/'. $idForum .'/topic');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function destroy($id) {
        //
    }
*/
}
