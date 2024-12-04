<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
    //variable pour selectionner toutes les villes et etudiants
        $villes  = Ville::all();
        $etudiants  = Etudiant::select()
            ->orderby('nom','desc')
            ->paginate(10);

    // retourne tableau villes et etudiants        
    return view('etudiant.index', ["etudiants" => $etudiants,"villes"=>$villes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'nom' => 'required|string|max:50|min:2',
            'addresse' => 'required|max:20|min:2',
            'date_naissance' => 'nullable|date',
            'telephone' => 'required|min:6',
            'email' => 'required|string',
            'ville_id' => 'required|string',
        ]);

    
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'addresse' => $request->addresse,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ville_id' => $request->ville_id
            
        ]);


        return redirect()->route('etudiant.index', $etudiant->etudiant_id)->with('success', 'Etudiant(e) ajouté!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Etudiant $etudiant)
    {
        // variable pr selectionner toutes les villes
        $villes = Ville::all();
        return view('etudiant.show', ['etudiant'=>$etudiant,'villes'=>$villes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etudiant $etudiant)
    {
        // variable pr selectionner toutes les villes
        $villes = Ville::all(); 
        return view('etudiant.edit', ['etudiant'=>$etudiant,'villes'=>$villes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //

        $request->validate([
            'nom' => 'required|string|max:255',
            'addresse' => 'required|string',
            'date_naissance' => 'nullable|date',
            'telephone' => 'required|string',
            'email' => 'required|string',
            'ville_id' => 'required|string',
        ]);
    
        $etudiant->update([
            'nom' => $request->nom,
            'addresse' => $request->addresse,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'ville_id' =>$request->ville_id
            
        ]);
    
        return redirect()->route('etudiant.show', $etudiant->etudiant_id)->with('success', "Les informations de l'étudiant(e) ont été modifiés.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etudiant $etudiant)
    {
        // Methode pour supprimer
        $etudiant->delete();

        return redirect()->route('etudiant.index')->with('success', 'Etudiant(e) supprimé!');
    }
}
