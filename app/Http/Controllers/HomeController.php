<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Emploi;

use DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){

       $categorie=DB::table('emplois')->select('contrat')->distinct()->get();

       $ville=DB::table('emplois')->select('ville')->distinct()->get();

       return view('home', ['categorie' => $categorie , 'ville' => $ville]);
     }

}
