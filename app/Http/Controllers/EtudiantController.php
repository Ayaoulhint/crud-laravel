<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantController extends Controller
{
    public function showLoginPage()
    {
        return view('etudiant.login'); // Assurez-vous que le fichier 'login.blade.php' existe dans resources/views
    }

    // Méthode pour traiter la connexion
    public function login(Request $request)
    {

        
        $email = $request->get('email');
        $password = $request->get('password');

        // Exemple de traitement (vous pouvez adapter selon votre logique)
        if ($email === 'admin@example.com' && $password === '1234') {
            // Stocker l'authentification dans la session
            $request->session()->put('loggedIn', true);

            return redirect('/liste_etudiant'); 
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function liste_etudiant()
    {
        $etudiants = Etudiant::paginate(10);
        return view('etudiant.liste', compact('etudiants'));

    }

    public function ajouter_etudiant()
    {
        return view('etudiant.ajouter');
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->save();

        return redirect('/ajouter')->with('status', 'Enregistrement avec succes');
    }

    public function update_etudiant($id){
        $etudiants = Etudiant::find($id);

        return view('etudiant.update', compact('etudiants'));
    }

    public function update_etudiant_traitement(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',
        ]);

        $etudiant = Etudiant::find($request->id);
        $etudiant->nom = $request->nom;
        $etudiant->prenom = $request->prenom;
        $etudiant->classe = $request->classe;
        $etudiant->update();
        return redirect('/liste_etudiant')->with('status', 'Modification avec succes');

    }


    public function delete_etudiant($id){
        $etudiant = Etudiant::find($id);
        $etudiant->delete();
        return redirect('/liste_etudiant')->with('status', 'Suppression avec succes');

    }
}
 