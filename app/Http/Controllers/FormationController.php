<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Formation;

use App\Competance;

use App\Emploi;

use App\Cv;

use Auth;

class FormationController extends Controller
{
        public function __construct()
        {
            $this->middleware('auth');
        }

        protected function validator(array $data)
        {
            return Validator::make($data, [
                'titre' => 'required|string|min:5',
                'socite' => 'required|string|min:5',
                'description' => 'required|string|min:5',
                'date_d' => 'required',
                'date_f' => 'required',
            ]);
        }

        public function create($cvId){

            $cv = Cv::find($cvId);

          return view('formation.create',['cv' => $cv ,'cvId' =>$cvId ]);
        }

        public function create_formation($emploId,$cvId){

            $emploi =Emploi::find($emploId);

            $cv = Cv::find($cvId);

          return view('formation.create_formation',['cv' => $cv ,'cvId' =>$cvId ,'emploi' => $emploi]);
        }


        //Enregistrer un cv
        public function store_formation( FormationRequest $request ,$emploId,$cvId ){

        $emploi= Emploi::find($emploId);

            $cv = Cv::find($cvId);

              $formation = new Formation();

                $formation->titre = $request->input('titre');
                $formation->socite = $request->input('socite');
                $formation->description = $request->input('description');
                $formation->date_d = $request->input('date_d');
                $formation->date_f = $request->input('date_f');
                $formation->cv_id = $cv->id;

              $formation->save();

          return redirect()->route('create_competance',['cv' => $cv ,'emploi' => $emploi]);

        }

        //Enregistrer un cv
        public function store( FormationRequest $request ,$cvId ){

            $cv = Cv::find($cvId);

              $formation = new Formation();

                $formation->titre = $request->input('titre');
                $formation->socite = $request->input('socite');
                $formation->description = $request->input('description');
                $formation->date_d = $request->input('date_d');
                $formation->date_f = $request->input('date_f');
                $formation->cv_id = $cv->id;

              $formation->save();

          return redirect()->route('competances.create',['cv' => $cv]);

        }

        public function edit($cvId ,$formationId){

            $cv = Cv::find($cvId);

            $formation = formation::find($formationId);

            return view('formation.edit', ['cv' => $cv , 'formation' => $formation]);

        }

        //Permet de modifier un emploi
        public function update(FormationRequest $request , $cvId ,$formationId ){

          $cv = Cv::find($cvId);

          $formation = Formation::find($formationId);

            $formation->titre = $request->input('titre');
            $formation->socite = $request->input('socite');
            $formation->description = $request->input('description');
            $formation->date_d = $request->input('date_d');

          $formation->save();

          $competance =Competance::find($cvId);

          return redirect()->route('competances.edit', ['cv' => $cv , 'competance' => $competance]);

        }
}
