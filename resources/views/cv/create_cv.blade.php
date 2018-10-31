@extends('layouts.app')


@section('content')

<link href="{{ asset('css/cvs.css') }}" rel="stylesheet">

<div class="carde" id="app" style="margin-top:3.2%;">
  <div class="filtre" id="fil">
    <div class="container">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>

      <form  action="{{url('emplois/'.$emploi->id.'/cvs/store_cv')}}" method="post">
        {{ csrf_field() }}
          <span class="catt" style="margin-left: 3%;">Information personnelle</span>

          <div class="row">
            <div class="col-1"></div>
            <div class="col-11" style="margin-left: 11%;">


              <label for="inp2" class="name">Nom </label>
              <input type="text" name="nom" v-model="cv.nom" id="inp2" class="na col-8" placeholder="Saisir votre nom">
              <div class="lineee"></div>

              @if($errors->get('nom'))
                  @foreach($errors->get('nom') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

              <label for="inp2" class="name">E-Mail</label>
              <input type="text" name="email" v-model="cv.email" id="inp2" class="na col-8" placeholder="Exemple : exemplemail@mail.com ">
              <div class="lineee"></div>

              @if($errors->get('email'))
                  @foreach($errors->get('email') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

              <label for="inp3" class="name">Statut</label>
              <textarea  type="text" name="description" v-model="cv.description" rows="1" id="inp3" style="margin-bottom:-15px;" class="na col-md-9" placeholder=""></textarea>
              <div class="lineee"></div>

              @if($errors->get('description'))
                  @foreach($errors->get('description') as $message)
                          <li>{{ $message }}</li>
                  @endforeach
              @endif

            </div>
            <div class="col-1"></div>
          </div>

          <div class="row">

            <div class="col-md-1"></div>

              <div class="col-md-5" style="margin-left: 3%;">


                <label for="inp1" class="name">Telephone</label>
                <input type="text" name="telephone" v-model="cv.telephone" id="inp1" class="na col-4" placeholder="+216********">
                <div class="line"></div>

                @if($errors->get('telephone'))
                    @foreach($errors->get('telephone') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

              </div>

              <div class="col-md-1" id="lin"></div>

              <div class="col-md-5">


                <label for="inp4" class="name">Ville</label>
                <input type="text" name="ville" v-model="cv.ville" id="inp4" class="na col-4" placeholder="Rue,ville,pays">
                <div class="line"></div>

                @if($errors->get('ville'))
                    @foreach($errors->get('ville') as $message)
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

                <input type="submit" class="btn btn-success col-md-3 mt-5 mr-5" value="Suivant >"  >
              </div>

          </form>



            <div class="espace"><div class="col-sm"></div></div>
          </div>
        </div>
      </div>
@endsection
