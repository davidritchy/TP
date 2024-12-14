<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Document;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $articles = Article::all();
        
        $users = User::all();
        return view('profile.index', ["articles" => $articles,"users" => $users]);
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $users = User::all();
        
        $documents = Document::select()
        ->orderby('id')
        ->paginate(4);
        return view('profile.fiche',['users'=>$users , 'documents'=>$documents]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        
        $request->validate([
            'titre' => 'required|string|max:50|min:2',
            'contenu' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

     

        $article = Article::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'due_date' => $request->due_date,
            'user_id' => $request->user_id
        ]);
    
        return redirect()->route('profile.index', $article->id)->with('success', 'article created successfully.');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //string $id
        return view('profile.show', ['article'=>$article]);

    }

    /**
     * Show the form for editing the specified resource.
     */ 
    public function edit(Article $article)
    {
        //
        return view('profile.edit', ['article'=>$article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
        
        $request->validate([
            'titre' => 'required|string|max:50|min:2',
            'contenu' => 'required|string',
            'due_date' => 'nullable|date',
        ]);
    
        $article->update([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'due_date' => $request->due_date,
            'user_id' => $request->user_id
            
        ]);
    
        return redirect()->route('profile.show', $article->id)->with('success', "L'article a été modifié.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();

        return redirect()->route('profile.index')->with('success', 'article supprimé!');
    }





    public function fiche(Request $request){

                
        $request->validate([
            'titre_document' => 'required|string|max:50|min:2',
        ]);

    

        $docs = Document::create([
            'titre_document' => $request->titre_document,
            'fichier' => $_FILES['formFile']['name'],
            'user_document' => $request->user_document
        ]);
    
      
       return redirect()->route('profile.fiche', $docs->id)->with('success', 'document created successfully.');


    }

    
}
