@extends('layouts.app')


@section('content')

<div class="carde" style="margin-top:3.2%;">
  <div class="filtre" id="fil">
    <div class="container" style="padding:2%;">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>

      <p class="catt" style="margin-left: 3%;">La Formulaire Du Test</p>

      <form  action="{{url('emplois/'.$emploi->id.'/tests/store_test')}}" method="post">


          <div class="row">

              {{ csrf_field() }}
              <div class="col-md-10" style="margin-left: 12%;">

                <label for="inp2" class="name" >Titre </label>
                <input type="text" id="inp2" name="titre" class="col-md-10 na" placeholder=" Saisir votre titre">
                <div class="linee"></div>

                @if($errors->get('titre'))
                    @foreach($errors->get('titre') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif


                <label for="inp2" class="name">Categorie</label>
                <input type="text" id="inp2" name="categorie" class="col-md-10 na" placeholder="Saisir votre categorie">
                <div class="linee"></div>

                @if($errors->get('categorie'))
                    @foreach($errors->get('categorie') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif


                <div class="row">
                  <div class="col-md-6 ml-2">
                    <label for="inp2" class="name">Durée</label>
                    <input type="note" id="inp2" name="note" class="col-md-8 na" placeholder="La durée du test">
                    <div class="line"></div>

                    @if($errors->get('note'))
                        @foreach($errors->get('note') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                  </div>
                  <div class="col-md-1" id="lin"></div>
                </div>

                </div>
                <div class="espace"><div class="col-sm"></div></div>
                <div class="espace"><div class="col-sm"></div></div>
                <div class="espace"><div class="col-sm"></div></div>
                <div class="espace"><div class="col-sm"></div></div>
            </div>
            <div class="col-md-12" style="text-align:center ">

            <input type="submit" class="btn btn-success col-md-2 mt-5 " value="Suivant >" style="margin-left:60%;">
          </div>
      </form>

            <div class="espace"><div class="col-sm"></div></div>
            <div class="espace"><div class="col-sm"></div></div>
            <div class="espace"><div class="col-sm"></div></div>
            <div class="espace"><div class="col-sm"></div></div>
          </div>
        </div>
      </div>

@endsection
