<?php

namespace App\Http\Controllers;

use Auth;

use App\Emploi;

use Illuminate\Http\Request;

use App\Http\Requests\EmploiRequest;

use Illuminate\Support\Facades\Validator;

class EmploiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //lister l'emploi
    public function index(){

        $listemploi = Emploi::all();

        return view('emploi.index',['emplois' => $listemploi]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'profile' => 'required|string|min:5',
            'entreprise' => 'required|string|min:5',
            'poste' => 'required|string|min:5',
            'titre' => 'required|string|min:5',
            'contrat' => 'required|string|min:5',
            'ville' => 'required|string|min:5',
            'salaire' => 'required|string|min:5',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        return view('emploi.create');
    }


    public function rechercher(Request $request){


        $ville = $request->input('ville');

        $contrat = $request->input('categorie');

        if (($ville == "Ville")&&($contrat == "Categorie")){
          $e = Emploi::paginate(15);
          return view('emploi.rechercher',['emplois'=>$e]);
        }

        if (($ville == "Ville")&&($contrat != "Categorie")){
          $e = Emploi::wherecontrat($contrat)->paginate(15)->get();
          return view('emploi.rechercher',['emplois'=>$e]);
        }

        if (($ville == "Ville")&&($contrat != "Categorie")){
          $e = Emploi::whereville($ville)->paginate(15)->get();
          return view('emploi.rechercher',['emplois'=>$e]);
        }

        $e = Emploi::whereville($ville)->wherecontrat($contrat)->paginate(15)->get();

        return view('emploi.rechercher',['emplois'=>$e]);

      }
    //Enregistrer un emploi
    public function store(EmploiRequest $request){

        $emploi = new Emploi();

        $emploi->titre = $request->input('titre');
        $emploi->contrat = $request->input('contrat');
        $emploi->ville = $request->input('ville');
        $emploi->salaire = $request->input('salaire');
        $emploi->profile = $request->input('profile');
        $emploi->poste = $request->input('poste');
        $emploi->entreprise = $request->input('entreprise');

        $emploi->user_id = Auth::user()->id;

        $emploi->save();

        session()->flash('success',"l'emploi à été bien enregistré !!");

        return redirect()->route('create_test',['emploi' => $emploi]);
    }

    //permet d'afficher les details d'emploi
    public function show ($id){

      $emploi = Emploi::find($id);

      return view('emploi.detail',compact('emploi'));

    }

    public function inscription ($id){

        $emploi = Emploi::find($id);

        return redirect()->route('create_cv',['emploi' => $emploi ]);
    }

    //Permet de récupérer un emploi puis de mettre dans le formulaire
    public function edit($id){

        $emploi = Emploi::find($id);

        return view('emploi.edit', ['emploi' => $emploi]);

    }

    //Permet de modifier un emploi
    public function update(EmploiRequest $request ,$id){

      $emploi = Emploi::find($id);

      $emploi->titre = $request->input('titre');
      $emploi->contrat = $request->input('contrat');
      $emploi->ville = $request->input('ville');
      $emploi->salaire = $request->input('salaire');
      $emploi->profile = $request->input('profile');
      $emploi->poste = $request->input('poste');
      $emploi->entreprise = $request->input('entreprise');

      $emploi->user_id = Auth::user()->id;

      $emploi->save();

      session()->flash('success',"l'emploi à été bien modifier !!");

      return redirect()->route('profiles');

    }

    //permet de surprimer un emploi
    public function destroy(EmploiRequest $request , $id){

        $emploi = Emploi::find($id);

        session()->flash('supprimer',"l'emploi à été bien supprimé !!");

        $emploi->delete();

        return redirect()->route('profiles');
    }

    public function deleteemploi($id){

      $emploi = Emploi::find($id);

      $emploi->delete();

      return Response()->json(['etat' => true ]);

    }


}
