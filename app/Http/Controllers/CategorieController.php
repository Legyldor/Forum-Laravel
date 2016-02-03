<?php

namespace App\Http\Controllers;

use App\ForumCategorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRequest;
use Illuminate\Support\Facades\Auth;
class CategorieController extends Controller {

    function __construct() {
        $this->middleware('authadmin', ['only' => ['create', 'edit']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /*public function index() {
        //
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        return view('forum.createCategorie');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategorieRequest $request) {

        //

        $categorie = new ForumCategorie;
        $categorie->setNom($request->input('cat_nom'));

        if (null !== (ForumCategorie::orderBy('cat_ordre', 'desc')->first())) {
            $lastCategorie = ForumCategorie::orderBy('cat_ordre', 'desc')->first();
        } else {
            $lastCategorie = new ForumCategorie;
        }

        $categorie->setOrdre($lastCategorie->getOrdre() + 1);
        $categorie->save();

        return redirect('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function show($id) {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $categorie = ForumCategorie::findOrFail($id);
        return ($categorie);
        return view('forum.editCategorie', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CategorieRequest $request) {
        //
        $categorie = ForumCategorie::findOrFail($id);
        
        $categorie->setNom($request->input('cat_nom'));
        $categorie->update();
        
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
