<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompetanceRequest;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use App\Competance;

use App\Cv;

use App\Emploi;

use Auth;

class CompetanceController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
        'c1' => 'required|string|min:2',
        'c2' => 'required|string|min:2',
        'c3' => 'required|string|min:2',
        'c4' => 'required|string|min:2',
        'p1' => 'required|numeric',
        'p2' => 'required|numeric',
        'p3' => 'required|numeric',
        'p4' => 'required|numeric',
        'p5' => 'required|numeric',
        'p6' => 'required|numeric',
        'p7' => 'required|numeric',
        'p8' => 'required|numeric',
        'p9' => 'required|numeric',
        'p10' => 'required|numeric',
        'p11' => 'required|numeric',
        'p12' => 'required|numeric',
      ]);
  }

  public function create($cvId){

      $cv = Cv::find($cvId);

    return view('competance.create',['cv' => $cv ,'cvId' =>$cvId ]);
  }

  public function create_competance($emploiId,$cvId){

    $emploi =Emploi::find($emploiId);

      $cv = Cv::find($cvId);

    return view('competance.create_competance',['cv' => $cv ,'cvId' =>$cvId ,'emploi' =>$emploi]);
  }

  //Enregistrer un cv
  public function store_competance( CompetanceRequest $request,$emploiId,$cvId ){

    $emploi = Emploi::find($emploiId);

      $cv = Cv::find($cvId);

      $competance= new Competance();

        $competance->p1 = $request->input('p1');
        $competance->p2 = $request->input('p2');
        $competance->p3 = $request->input('p3');
        $competance->p4 = $request->input('p4');
        $competance->p5 = $request->input('p5');
        $competance->p6 = $request->input('p6');
        $competance->p7 = $request->input('p7');
        $competance->p8 = $request->input('p8');
        $competance->p9 = $request->input('p9');
        $competance->p10 = $request->input('p10');
        $competance->p11 = $request->input('p11');
        $competance->p12 = $request->input('p12');
        $competance->c1 = $request->input('c1');
        $competance->c2 = $request->input('c2');
        $competance->c3 = $request->input('c3');
        $competance->c4 = $request->input('c4');
        $competance->cv_id = $cv->id;

      $competance->save();

      return redirect()->route('show_tests' ,['emploi'=>$emploi , 'cv' =>$cv ]);

  }

    public function store( CompetanceRequest $request,$cvId ){

        $cv = Cv::find($cvId);

        $competance= new Competance();

          $competance->p1 = $request->input('p1');
          $competance->p2 = $request->input('p2');
          $competance->p3 = $request->input('p3');
          $competance->p4 = $request->input('p4');
          $competance->p5 = $request->input('p5');
          $competance->p6 = $request->input('p6');
          $competance->p7 = $request->input('p7');
          $competance->p8 = $request->input('p8');
          $competance->p9 = $request->input('p9');
          $competance->p10 = $request->input('p10');
          $competance->p11 = $request->input('p11');
          $competance->p12 = $request->input('p12');
          $competance->c1 = $request->input('c1');
          $competance->c2 = $request->input('c2');
          $competance->c3 = $request->input('c3');
          $competance->c4 = $request->input('c4');
          $competance->cv_id = $cv->id;

        $competance->save();

        return redirect()->route('show_tests' ,['emploi'=>$emploi , 'cv' =>$cv ]);

    }

  public function edit($cvId,$competanceId){

      $cv = Cv::find($cvId);

      $competance = Competance::find($competanceId);

      return view('competance.edit',  ['cv' => $cv , 'competance' => $competance ]);

  }

  //Permet de modifier un emploi
  public function update(Request $request , $cvId,$competanceId){

    $cv = Cv::find($cvId);

    $competance = Competance::find($competanceId);

      $competance->p1 = $request->input('p1');
      $competance->p2 = $request->input('p2');
      $competance->p3 = $request->input('p3');
      $competance->p4 = $request->input('p4');
      $competance->p5 = $request->input('p5');
      $competance->p6 = $request->input('p6');
      $competance->p7 = $request->input('p7');
      $competance->p8 = $request->input('p8');
      $competance->p9 = $request->input('p9');
      $competance->p10 = $request->input('p10');
      $competance->p11 = $request->input('p11');
      $competance->p12 = $request->input('p12');
      $competance->c1 = $request->input('c1');
      $competance->c2 = $request->input('c2');
      $competance->c3 = $request->input('c3');
      $competance->c4 = $request->input('c4');
      $competance->cv_id = $cv->id;

    $competance->save();

    return redirect()->route('cvs.index',['cv' => $cv]);

  }
}
