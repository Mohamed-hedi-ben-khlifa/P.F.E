<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExperienceRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Experience;

use App\Formation;

use App\Emploi;

use App\Cv;

use Auth;

class ExperienceController extends Controller
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

  public function create_experience($emploId,$cvId){

      $cv = Cv::find($cvId);

      $emploi = Emploi::find($emploId);

    return view('experience.creates',['cv' => $cv ,'cvId' =>$cvId ,'emploi' => $emploi]);
  }

  public function create($cvId){

    $cv = Cv::find($cvId);

    return view('experience.create',['cv' => $cv ,'cvId' =>$cvId ]);
  }

  //Enregistrer un cv
  public function store_experience( ExperienceRequest $request ,$emploId,$cvId ){


    $emploi = Emploi::find($emploId);

    $cv = Cv::find($cvId);

      $experience= new Experience();

        $experience->titre = $request->input('titre');
        $experience->socite = $request->input('socite');
        $experience->description = $request->input('description');
        $experience->date_d = $request->input('date_d');
        $experience->date_f = $request->input('date_f');
        $experience->cv_id = $cv->id;

      $experience->save();

      return redirect()->route('create_formation',['emploi' => $emploi,'cv' => $cv ]);

  }

  public function store( ExperienceRequest $request ,$cvId ){

    $cv = Cv::find($cvId);

      $experience= new Experience();

        $experience->titre = $request->input('titre');
        $experience->socite = $request->input('socite');
        $experience->description = $request->input('description');
        $experience->date_d = $request->input('date_d');
        $experience->date_f = $request->input('date_f');
        $experience->cv_id = $cv->id;

      $experience->save();

      return redirect()->route('formations.create',['cv' => $cv ]);

  }

  public function v_e($cvId){

      $cv = Cv::find($cvId);

      $experience = Experience::find($cvId);

      return redirect()->route('experiences.edit', ['cv' => $cv , 'experience' => $experience ]);

  }

  public function edit($cvId , $experienceId){

      $cv = Cv::find($cvId);

      $experience = Experience::find($experienceId);

      return view('experience.edit', ['cv' => $cv , 'experience' => $experience]);

  }

  //Permet de modifier un emploi
  public function update(Request $request , $cvId ,$experienceId ){

    $cv = Cv::find($cvId);

    $experience = Experience::find($experienceId);

      $experience->titre = $request->input('titre');
      $experience->socite = $request->input('socite');
      $experience->description = $request->input('description');
      $experience->date_d = $request->input('date_d');
      $experience->date_f = $request->input('date_f');

    $experience->save();

    $formation = Formation::find($cvId);

    return redirect()->route('formations.edit', ['cv' => $cv , 'formation' => $formation]);

  }
}
