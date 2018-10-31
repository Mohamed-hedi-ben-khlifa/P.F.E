<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cv;

use App\Experience;

use App\Emploi;

use App\Test;

use App\Formation;

use App\Competance;

use App\Http\Requests\CvRequest;

use Illuminate\Support\Facades\Validator;

use Auth;

class CvController extends Controller
{


      public function __construct()
      {
          $this->middleware('auth');
      }

      protected function validator(array $data)
      {
          return Validator::make($data, [
              'nom' => 'required|string|min:5',
              'ville' => 'required|string|min:5',
              'telephone' => 'required|string|min:5',
              'description' => 'required|string|min:5',
              'email' => 'required|string|min:5',
          ]);
      }

      //Affiche le formulaire de creation d'un CV
      public function create(){

        $user= Auth::user();

        return view('cv.create',['users',$user]);

      }

      public function create_cv($emploiId){

        $user= Auth::user();

        $emploi =Emploi::find($emploiId);

        return view('cv.create_cv' ,['emploi' =>$emploi , 'user',$user]);

      }

      public function cv_create(){

        $user= Auth::user();

        return view('cv.create',['user',$user]);

      }


      public function index($emploiId){

          $listecv = Auth::user()->cvs()->paginate(5);

          $emploi =Emploi::find($emploiId);

          return  view('cv.index',['cvs' => $listecv ,'emploi'=>$emploi]);

      }

      //Enregistrer un cv
      public function store( CvRequest $request){


          $cv = new Cv();

            $cv->nom = $request->input('nom');
            $cv->ville = $request->input('ville');
            $cv->telephone = $request->input('telephone');
            $cv->email = $request->input('email');
            $cv->description = $request->input('description');
            $cv->emploi_id=1;
            $cv->user_id = Auth::user()->id;


          $cv->save();

        return redirect()->route('experience',['cv' => $cv ]);

      }


      public function store_cv( CvRequest $request,$emploId){

        $emploi= Emploi::find($emploId);

          $cv = new Cv();

            $cv->nom = $request->input('nom');
            $cv->ville = $request->input('ville');
            $cv->telephone = $request->input('telephone');
            $cv->email = $request->input('email');
            $cv->description = $request->input('description');
            $cv->user_id = Auth::user()->id;
            $cv->emploi_id=$emploi->id;

          $cv->save();

        return redirect()->route('experiences',['emploi' =>$emploi,'cv' => $cv ]);

      }

      public function cv_store( request $request){



          $cv = new Cv();

            $cv->nom = $request->input('nom');
            $cv->ville = $request->input('ville');
            $cv->telephone = $request->input('telephone');
            $cv->email = $request->input('email');
            $cv->description = $request->input('description');
            $cv->user_id = Auth::user()->id;

          $cv->save();

        return redirect()->route('experiences',['cv' => $cv ]);

      }

      public function experience ($cvId){

          $cv =Cv::find($cvId);

          return redirect()->route('experiences.create',['cv' => $cv]);

      }

      public function experiences ($emploId,$cvId){

        $emploi= Emploi::find($emploId);

          $cv =Cv::find($cvId);

          return redirect()->route('create_experience',['emploi' =>$emploi,'cv' => $cv]);

      }


      public function edit($id){

          $cv = Cv::find($id);

          $experience = $cv->experiences;

          $formation = $cv->formations;

          $competance = $cv->competances;

          return view('cv.edit', ['id' => $id, 'cv' => $cv , 'experience' => $experience, 'formation' => $formation, 'competance' => $competance]);

      }

      //Permet de modifier un emploi
      public function update(Request $request , $id){

        $cv = Cv::find($id);

        $cv->nom = $request->input('nom');
        $cv->ville = $request->input('ville');
        $cv->telephone = $request->input('telephone');
        $cv->email = $request->input('email');
        $cv->description = $request->input('description');

        $cv->save();

        $experience = Experience::find($id);

        return redirect()->route('profiles');

      }
      public function home (){

        return redirect()->route('cvs.show');

      }

      public function modifier (){

        return redirect()->route('cvs.edit');

      }


      //permet d'afficher les details d'emploi
      public function show ($cvId){


        $cv = Cv::find($cvId);

        return view('cv.show',[ 'cv' => $cv ]);

      }

      //permet de surprimer un emploi
      public function destroy(Request $request , $cvId){

          $cv = Cv::find($cvId);

          session()->flash('supprimer',"le cv à été bien supprimé !!");

          $cv->delete();

          return redirect('profiles');
      }

      public function getcv ($id){

            $cv = Cv::find($id);

            return $cv;
      }

      public function addcv(Request $request ,$id){

        $cv = new Cv;

        $cv->nom = $request->input('nom');
        $cv->ville = $request->input('ville');
        $cv->telephone = $request->input('telephone');
        $cv->email = $request->input('email');
        $cv->description = $request->input('description');

        $cv->save();

        return Response()->json(['etat' => true , 'id' => $cv->id ]);

      }

      public function updatecv(Request $request,$id){


        $cv = Cv::find($request->id);

        $cv->nom = $request->input('nom');
        $cv->ville = $request->input('ville');
        $cv->telephone = $request->input('telephone');
        $cv->email = $request->input('email');
        $cv->description = $request->input('description');

        $cv->save();

        return Response()->json(['etat' => true ]);

      }

      public function deletecv($id){

        $cv = cv::find($id);

        $cv->delete();

        return Response()->json(['etat' => true]);
      }

      public function getexperiences ($id){

            $cv = Cv::find($id);

            return $cv->experiences()->orderBy('created_at','desc')->get();

      }

      public function addexperience(Request $request ,$id){

        $experience = new Experience;

          $experience->titre     = $request->input('titre');
          $experience->socite     = $request->input('socite');
          $experience->description     = $request->input('description');
          $experience->date_d     = $request->input('date_d');
          $experience->date_f     = $request->input('date_f');
          $experience->cv_id      = $id;
          $experience->save() ;

        return Response()->json(['etat' => true , 'id' => $experience->id ]);

      }

      public function updateexperience(Request $request,$id){


        $question = Experience::find($request->id);

        $experience->titre     = $request->input('titre');
        $experience->socite     = $request->input('socite');
        $experience->description     = $request->input('description');
        $experience->date_d     = $request->input('date_d');
        $experience->date_f     = $request->input('date_f');
        $experience->cv_id      = $id;
        $experience->save() ;

        return Response()->json(['etat' => true ]);

      }

      public function deleteexperience($id){

        $experience = Experience::find($id);

        $experience->delete();

        return Response()->json(['etat' => true ,]);

      }


      public function getformations ($id){


            $cv = Cv::find($id);

            return $cv->formations()->orderBy('created_at','desc')->get();

      }

      public function addformation(Request $request ,$id){

        $formation = new Formation;

          $formation->titre     = $request->input('titre');
          $formation->socite     = $request->input('socite');
          $formation->description     = $request->input('description');
          $formation->date_d     = $request->input('date_d');
          $formation->date_f     = $request->input('date_f');
          $formation->cv_id      = $id;
          $formation->save() ;

        return Response()->json(['etat' => true , 'id' => $formation->id ]);

      }

      public function updateformation(Request $request,$id){


        $formation = formation::find($request->id);

          $formation->titre     = $request->input('titre');
          $formation->socite     = $request->input('socite');
          $formation->description     = $request->input('description');
          $formation->date_d     = $request->input('date_d');
          $formation->date_f     = $request->input('date_f');
          $formation->cv_id      = $id;
          $formation->save() ;

        return Response()->json(['etat' => true ]);

      }

      public function deleteformation($id){

        $formation = Formation::find($id);

        $formation->delete();

        return Response()->json(['etat' => true ]);

      }


      public function getcompetances ($id){


            $cv = Cv::find($id);

            return $cv->competances()->orderBy('created_at','desc')->get();

      }

      public function addcompetance(Request $request ,$id){

        $competance = new Competance;

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
          $competance->cv_id = $id;
        $competance->save();

        return Response()->json(['etat' => true , 'id' => $competance->id ]);

      }

      public function updatecompetance(Request $request,$id){


        $competance = Competance::find($request->id);

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
            $competance->cv_id = $id;

          $competance->save() ;

        return Response()->json(['etat' => true ]);

      }

      public function deletecompetance($id){

        $competance = Competance::find($id);

        $competance->delete();

        return Response()->json(['etat' => true ,]);

      }

      public function get_cv ($emploiId,$cvId)
   {
     $cv = Cv::find($cvId);

     return view('cv.show',compact('cv'));
   }

   public function get_emploi ($emploiId,$cvId)
   {
     $emploi = Emploi::find($emploiId);

     return view('emploi.show',compact('emploi'));
   }

   public function get_test ($emploiId,$cvId)
   {

      $emploi = Emploi::find($emploiId);

      $id=$emploi->id;

      $cv =Cv::find($cvId);

      $test = Test::find($id);

      return view('test.show',compact('test','emploi','cv'));
   }



}
