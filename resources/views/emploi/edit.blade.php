@extends('layouts.app')


@section('content')

<div class="carde" style="margin-top:3.2%;">
  <div class="filtre" id="fil">
    <div class="container">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>

      <form  action="{{url('emplois/'.$emploi->id)}}" method="post">
      <input type="hidden" name="_method" value="PUT">

        {{ csrf_field() }}

          <span class="catt" style="margin-left: 3%;">Formulaire d'emplois</span>

          <div class="row">
            <div class="col-1"></div>
            <div class="col-11" style="margin-left: 11%;">
              <label for="inp3" class="name">Le profile</label>
              <textarea  type="text" name="profile"  rows="1" id="inp3" style="margin-bottom:-15px;" class="na col-md-9" placeholder="Lorem ipsum
              dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. nisi ut aliquip ex ea commodo consequat.
               Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. sunt in culpa qui officia deserunt mollit anim id est laborum">{{$emploi->profile}}</textarea>
              <div class="lineee"></div>

              @if($errors->get('profile'))
                  @foreach($errors->get('profile') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

              <label for="inp2" class="name">L'entreprise </label>
              <input type="text" name="entreprise"  value="{{$emploi->entreprise}}" id="inp2" class="na col-8" placeholder="Saisie votre nom">
              <div class="lineee"></div>

              @if($errors->get('entreprise'))
                  @foreach($errors->get('entreprise') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

              <label for="inp2" class="name">Le poste</label>
              <input type="text" name="poste" id="inp2" value="{{$emploi->poste}}" class="na col-8" placeholder="Exemple : exemplemail@mail.com ">
              <div class="lineee"></div>

              @if($errors->get('poste'))
                  @foreach($errors->get('poste') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

            </div>
            <div class="col-1"></div>
          </div>


          <div class="row">
            <div class="col-md-1"></div>
              <div class="col-md-5" style="margin-left: 3%;">
                <label for="inp1" class="name">titre</label>
                <input type="text" name="titre" value="{{$emploi->titre}}" id="inp1" class="na col-4" placeholder="+216********">
                <div class="line"></div>

                  @if($errors->get('titre'))
                      @foreach($errors->get('titre') as $message)
                              <li>{{ $message }}</li>
                      @endforeach
                  @endif

                <label for="inp1" class="name">Contrat</label>
                <input type="text" name="contrat"  id="inp1" value="{{$emploi->contrat}}" class="na col-4" placeholder="+216********">
                <div class="line"></div>

                @if($errors->get('contrat'))
                    @foreach($errors->get('contrat') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

              </div>
              <div class="col-md-1" id="lin"></div>
              <div class="col-md-5">
                <label for="inp4" class="name">Localisation</label>
                <input type="text" name="ville" value="{{$emploi->ville}}" id="inp4" class="na col-4" placeholder="Rue,ville,pays">
                <div class="line"></div>

                @if($errors->get('ville'))
                    @foreach($errors->get('ville') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

                <label for="inp1" class="name">Salaire</label>
                <input type="text" name="salaire"  value="{{$emploi->salaire}}" id="inp1" class="na col-4" placeholder="+216********">
                <div class="line"></div>

                @if($errors->get('salaire'))
                    @foreach($errors->get('salaire') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

              </div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
          </div>


              <div class="col-md-12" style="text-align:right; ">

                <input type="submit" class="btn btn-success col-md-3 m-1 mr-5" value="Terminer"  >
              </div>

          </form>



            <div class="espace"><div class="col-sm"></div></div>
          </div>
        </div>
      </div>
@endsection
