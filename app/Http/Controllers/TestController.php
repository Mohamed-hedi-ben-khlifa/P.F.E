<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TestRequest;

use Illuminate\Support\Facades\Validator;

use App\Test;

use App\Cv;

use App\Question;

use App\Candidature;

use App\Emploi;

use App\User;

use App\Notifications\post_notification;

use Auth;

class TestController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  protected function validator(array $data)
  {
      return Validator::make($data, [
          'titre' => 'required|string|min:5',
          'categorie' => 'required|string|min:5',
          'note' => 'required|string|min:5',
      ]);
  }

  //lister l'emploi
  public function index(){

      $test = Test::all();

      return view('test.index',['tests' => $test]);
  }

  //Affiche le formulaire de creation d'emploi
  public function create_test($emploiId){

    $user = Auth::user();

    $emploi=Emploi::find($emploiId);

    return view('test.create' ,['emploi' => $emploi , 'user' => $user]);

  }

  //Enregistrer un emploi
  public function store_test( TestRequest $request ,$emploiId){

    $emploi=Emploi::find($emploiId);

      $test = new Test();

      $test->titre = $request->input('titre');
      $test->categorie = $request->input('categorie');
      $test->note = $request->input('note');
      $test->emploi_id=$emploiId;
      $test->user_id = Auth::user()->id;

      $test->save();

      session()->flash('success',"test à été bien enregistré !!");

      return redirect()->route('question',['emploi' =>$emploi,'test' => $test]);
  }
  public function show ($id){

    $test = Test::find($id);

    return view('test.passe_test',['test'=>$test]);
  }

  //permet d'afficher les details d'emploi
  public function show_tests ($emploiId,$cvId){

    $emploi=Emploi::find($emploiId);

    $cv=Cv::find($cvId);

    $test = Test::find($emploiId);

    return view('test.show',['emploi'=>$emploi ,'cv' => $cv ,'test'=>$test]);
  }

  //permet d'afficher les details d'emploi
  public function show_test ($emploiId,$testId){

    $emploi=Emploi::find($emploiId);

    $test = $emploi->tests;

    return view('test.passe_test',['emploi'=>$emploi , 'test'=>$test ]);
  }


  public function question ($emploiId,$testId){

    $emploi= Emploi::find($emploiId);

    $test = Test::find($testId);

    return view('test.ajouter_question',['testId' => $testId]);

  }

  //Permet de récupérer un emploi puis de mettre dans le formulaire
  public function edit($id){

      $test = Test::find($id);

      return view('test.edit', [ 'test' => $test ,'id' =>$id]);

  }

  //Permet de modifier un emploi
  public function update(Request $request , $emploiId,$testId){


    $test = new Test();

    $test->titre     = $request->input('titre');
    $test->categorie = $request->input('categorie');
    $test->note      = $request->input('note');


    $test->save();

    session()->flash('edit',"test à été bien edité !!");

    return redirect()->route('profiles');

  }

  //permet de surprimer un emploi
  public function destroy(Request $request , $id){

      $test = Test::find($id);


      session()->flash('supprimer',"test à été bien supprimé !!");

      $test->delete();

      return redirect()->route('profiles');
  }

  public function create_notification_admin ($emploiId,$cvId){

      $emploi= Emploi::find($emploiId);

      $utilisateur = $emploi->user_id;

      $us =       $user = Auth::user();


      $cv = Cv::find($cvId);

      $user = Auth::user();

        $user->notify(new post_notification($us,$cv,$emploi));




    return redirect()->route('home');

  }

  public function getquestions ($id){


        $test = Test::find($id);

        return $test->questions;

  }

  public function gettests (){


        $test = Test::all();

        return $test;

  }

  public function addquestion(Request $request ,$id){

    $question = new Question;

      $question->question     = $request->input('question');
      $question->reponse1     = $request->input('reponse1');
      $question->reponse2     = $request->input('reponse2');
      $question->reponse3     = $request->input('reponse3');
      $question->reponse4     = $request->input('reponse4');
      $question->choix1       = $request->input('choix1');
      $question->choix2       = $request->input('choix2');
      $question->choix3       = $request->input('choix3');
      $question->choix4       = $request->input('choix4');

      $question->test_id      = $id;
      $question->save() ;

      dump($request);

    return Response()->json(['etat' => true , 'id' => $question->id ]);

  }

  public function updatequestion(Request $request,$id){


    $question = Question::find($request->id);

      $question->question     = $request->input('question');
      $question->reponse1     = $request->input('reponse1');
      $question->reponse2     = $request->input('reponse2');
      $question->reponse3     = $request->input('reponse3');
      $question->reponse4     = $request->input('reponse4');
      $question->test_id      = $id;
      $question->save() ;

    return Response()->json(['etat' => true ]);

  }

  public function deletequestion($id){

    $question = Question::find($id);

    $question->delete();

    return Response()->json(['etat' => true ,]);

  }

  public function deletetest($id){

    $test = test::find($id);

    $question = Question::find($id);

    $question->delete();

    $test->delete();

    return Response()->json(['etat' => true ]);

  }
}
