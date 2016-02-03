<?php

namespace App\Http\Controllers;

use App\ForumForum;
use App\ForumCategorie;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\ForumRang;
use App\Http\Requests\ForumRequest;
use Carbon\Carbon;

class ForumController extends Controller {

    function __construct() {
        $this->middleware('authadmin', ['only' => ['create', 'edit']]);
    }
    
    public function index() {
        if (Auth::user() != NULL) {
            Auth::user()->setDateLastVisite(Carbon::now());
            Auth::user()->update();
        }
        $ajouter = false;
        $rangPermission = 1;
        if (Auth::user() != Null) {
            $rangPermission = Auth::user()->rang()->first()->getId();
        }
        $categories = ForumCategorie::orderBy('cat_ordre')->get();
        $forums = array();
        foreach ($categories as $index => $categorie) {
            $categorieForums = ForumForum::where('forum_cat_id', '=', $categorie->getId())->where('auth_view', '<=', $rangPermission)->get();
            foreach ($categorieForums as $forum) {
                $forums += [$forum->id => $forum];
            }
            if ($categorieForums->isEmpty()) {
                unset($categories[$index]);
            }
        }
        // tester autorisation d'ajout
        if (Auth::user() != NULL) {
            if (Auth::user()->rang()->first()->getId() == 4) {

                $ajouter = true;
            }
        }
        return view('forum.forums')->with(compact('categories', 'forums', 'ajouter'));
    }

    public function show($id) {
        return redirect('forum/' . $id . '/topic');
    }

    public function create() {

        $categories = ForumCategorie::all()->lists('cat_nom', 'id');

        $rangs = ForumRang::all()->lists('rang_nom', 'id');

        return view('forum.createForum')->with(compact('categories', 'rangs'));
    }

    public function store(ForumRequest $request) {

        $forum = new ForumForum;

        if (null !== (ForumForum::orderBy('forum_ordre', 'desc')->first())) {
            $lastForum = ForumForum::orderBy('forum_ordre', 'desc')->first();
        } else {
            $lastForum = new ForumForum;
        }

        $forum->setCategorieId($request->input('forum_cat_id'));
        $forum->setNom($request->input('forum_name'));
        $forum->setDescription($request->input('forum_desc'));
        $forum->setLastPostId(0);
        $forum->setNbTopic(0);
        $forum->setNbPost(0);
        $forum->setPermissionVoir($request->input('auth_view'));
        $forum->setPermissionPost($request->input('auth_post'));
        $forum->setPermissionTopic($request->input('auth_topic'));
        $forum->setPermissionAnnonce($request->input('auth_annonce'));
        $forum->setPermissionModerer($request->input('auth_modo'));

        $forum->setOrdre($lastForum->getOrdre() + 1);

        $forum->save();

        return redirect('forum');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $forum = ForumForum::findOrFail($id);

        $categories = ForumCategorie::all()->lists('cat_nom', 'id');

        $rangs = ForumRang::all()->lists('rang_nom', 'id');

        return view('forum.editForum')->with(compact('forum', 'categories', 'rangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ForumRequest $request) {
        //
        $forum = ForumForum::findOrFail($id);

        $forum->setCategorieId($request->input('forum_cat_id'));
        $forum->setNom($request->input('forum_name'));
        $forum->setDescription($request->input('forum_desc'));
        $forum->setPermissionVoir($request->input('auth_view'));
        $forum->setPermissionPost($request->input('auth_post'));
        $forum->setPermissionTopic($request->input('auth_topic'));
        $forum->setPermissionAnnonce($request->input('auth_annonce'));
        $forum->setPermissionModerer($request->input('auth_modo'));

        $forum->update();

        return redirect('forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   /* public function destroy($id) {
        //
    }*/

}
