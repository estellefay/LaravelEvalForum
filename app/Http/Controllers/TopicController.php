<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $topics = Topic::all();
        return view('index', ['topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request);
        $topic = new Topic;
        $topic->titre = $request->titre;
        $topic->prix = $request->message;
        $topic->save();
        //return redirect()->route('topics.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $topic = Topic::findOrFail($id);       
        return view('show', ['topic' => $topic]);
        // A ajouter recup les commentaire
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $topic = Topic::findOrFail($id);
        return view('edit', ['topic' => $topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $topic->titre = $request->titre;
        $topic->prix = $request->message;
        $voyage->save();
        return redirect()->route('index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->route('home');
    }

    //Id est l'id du topic
    public function commentaire(Request $request, $id) {
        $commentaire = new Commentaire;
        $commentaire->content = $request->content;
        $commentaire->topic_id = $request->id;
        $commentaire->save();
    }

    public function search(Request $request) {
  
        $result = Topic::where('titre', 'Like', "%o%")->get();
        dd($result);
        //return redirect()->route('topics.index'); avec param pour filter le result

    }

}
