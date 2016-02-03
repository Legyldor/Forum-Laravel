<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\ForumTopic;
use App\ForumPost;
use App\ForumForum;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    function __construct() {
        $this->middleware('authview', ['only' => 'index']);
        $this->middleware('authpost', ['only' => 'create']);
        $this->middleware('authmodo', ['only' => 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($idForum, $idTopic) {
        //
        $ajouter = false;
        $forum = ForumForum::findOrFail($idForum);
        $topic = ForumTopic::findOrFail($idTopic);
        $posts = ForumPost::where('forum_topic_id', '=', $idTopic)->orderBy('created_at')->paginate(10);

        // tester autorisation d'ajout
        if(Auth::user() != NULL){
            if((Auth::user()->rang()->first()->getId() >= $forum->getPermissionPost()) && ($topic->getGenreId() != 2)){

                $ajouter = true;
            }
        }
        foreach($posts as $post){
            $post->setTexte(str_replace('<script', '', $post->getTexte()));
            $post->setTexte(str_replace('</script', '', $post->getTexte()));
            $post->setTexte(str_replace('<div', '', $post->getTexte()));
            $post->setTexte(str_replace('</div', '', $post->getTexte()));
        }
        return view('forum.posts')->with(compact('topic', 'forum', 'posts', 'ajouter', 'idForum', 'idTopic'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($idForum, $idTopic) {
        //
        
        return view('forum.createPost')->with(compact('idForum', 'idTopic'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($idForum, $idTopic, PostRequest $request) {
        //
        $post = new ForumPost;
        
        $post->setTexte($request->input('post_texte'));
        $post->setForumId($idForum);
        $post->setTopicId($idTopic);
        $post->setIsDelete(false);
        Auth::user()->posts()->save($post);
        Auth::user()->setNbPost(Auth::user()->getNbPost()+1);
        Auth::user()->update();
        
        return redirect('forum/'.$idForum.'/topic/'. $idTopic .'/post');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($idForum, $idTopic, $id) {
        //
            return redirect('forum/'.$idForum.'/topic/'. $idTopic .'/post');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($idForum, $idTopic, $id) {
        //
        $post = ForumPost::findOrFail($id);
        return view('forum.editPost')->with(compact('idForum', 'idTopic', 'post'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($idForum, $idTopic, $id, PostRequest $request) {
        //
        $post = ForumPost::findOrFail($id);
        
        $post->setTexte($request->input('post_texte'));
        
        $post->save();
        
        return redirect('forum/'.$idForum.'/topic/'. $idTopic .'/post');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idForum, $idTopic, $id) {
        //
        $post = ForumPost::findOrFail($id);
        
        if($post->getIsDelete() == false){
            $post->setIsDelete(true);
        
            $post->save();
        } else {
           $post->setIsDelete(false);
        
            $post->save(); 
        }
        
        return redirect('forum/'.$idForum.'/topic/'. $idTopic .'/post');
    }

}
