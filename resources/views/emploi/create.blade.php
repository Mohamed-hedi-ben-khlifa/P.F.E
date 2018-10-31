@extends('layouts.app')


@section('content')

<div class="carde" style="margin-top:3.2%;" >
  <div class="filtre" id="fil">
    <div class="container">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>

      <form  action="{{url('emplois')}}" method="post">
        @csrf
        {{ csrf_field() }}
          <span class="catt" style="margin-left: 3%;">Formulaire d'emplois</span>

          <div class="row">
            <div class="col-1"></div>
            <div class="col-11" style="margin-left: 11%;">



              <label for="inp3" class="name">Le profil</label>

              <input  type="text" name="profile" rows="1" id="profile" style="margin-bottom:-15px;"class="na"    class="form-control col-12" value="{{ old('profile') }}"  placeholder="Saisir votre profil" >
              <div class="lineee"></div>

              @if($errors->get('profile'))
                  @foreach($errors->get('profile') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

              <label for="inp2" class="name">L'entreprise </label>

                  <input type="text" v-model="emploi.entreprise" id="inp2" class="na col-8" placeholder="Saisie votre nom" class="form-control" name="entreprise" value="{{ old('entreprise') }}" >
                  <div class="lineee"></div>

                  @if($errors->get('entreprise'))
                      @foreach($errors->get('entreprise') as $message)
                              <li>{{ $message }}</li>
                      @endforeach
                  @endif


              <label for="inp2" class="name">Le poste</label>
                <input type="text" v-model="emploi.poste" id="inp2" class="na col-8"  class="form-control{{ $errors->has('poste') ? ' is-invalid' : '' }}" name="poste" value="{{ old('poste') }}" placeholder="Saisir votre poste " >
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
                  <input type="text" name="titre" v-model="emploi.titre" id="inp1" class="na col-4" placeholder="Saisir votre titre">
                  <div class="line"></div>

                  @if($errors->get('titre'))
                      @foreach($errors->get('titre') as $message)
                              <li>{{ $message }}</li>
                      @endforeach
                  @endif

                <label for="inp1" class="name">Categorie</label>
                <input type="text" name="contrat" v-model="emploi.contrat" id="inp1" class="na col-4" placeholder="Santé,Comemerce...">
                <div class="line"></div>

                @if($errors->get('contrat'))
                    @foreach($errors->get('contrat') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

            </div>
            <div class="col-md-1" id="lin"></div>
            <div class="col-md-5">


                <label for="inp4" class="name">Ville</label>
                <input type="text" name="ville" v-model="emploi.ville" id="inp4" class="na col-4" placeholder="Rue,ville,pays">
                <div class="line"></div>

                @if($errors->get('ville'))
                    @foreach($errors->get('ville') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

                <label for="inp1" class="name">Salaire</label>
                <input type="text" name="salaire" v-model="emploi.salaire" id="inp1" class="na col-4" placeholder="3000$/mois">
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

                <input type="submit" class="btn btn-success col-md-3 m-1 mt-5 mr-5" value="Suivant >"  >
              </div>

          </form>



            <div class="espace"><div class="col-sm"></div></div>
          </div>
        </div>
      </div>
@endsection
