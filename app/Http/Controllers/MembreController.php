<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\MembreRequest;

class MembreController extends Controller {
    
    function __construct() {
        $this->middleware('authmembre', ['only' => 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $membres = User::orderBy('created_at')->paginate(50);

        return view('forum.membres')->with(compact('membres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /*public function create() {
        //
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    /*public function store(MembreRequest $request) {
        //
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $membre = User::findOrFail($id);
        return view('forum.membre')->with(compact('membre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
        $membre = User::findOrFail($id);
        return view('forum.editMembre')->with(compact('membre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, MembreRequest $request) {
        //
        $membre = User::findOrFail($id);

        $membre->setPseudo($request->input('pseudo'));
        $membre->setEmail($request->input('email'));
        $membre->setLocalisation($request->input('localisation'));
        $membre->setSiteweb($request->input('siteweb'));
        $membre->setSignature($request->input('signature'));

        if ($request->hasFile('avatar')) {
            //
            if ($request->file('avatar')->isValid()) {
                //
                $extension_upload = strtolower(substr(strrchr($request->file('avatar')->getFilename(), '.'), 1));
                $name = time();
                $nomavatar = str_replace(' ', '', $name) . "." . $extension_upload;
                $request->file('avatar')->move(
                        base_path() . '/public/img/avatar/', $nomavatar
                );
                $membre->setAvatar($nomavatar);
            }
        }

        $membre->save();

        return redirect('membre/' . $id);
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
