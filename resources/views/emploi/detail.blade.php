@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/emploi.css') }}" rel="stylesheet">

  <div class="container" style="margin-top:6%;">
    <div class="page">
      <div class="image">
        <div class="filtre" id="fil">

          <div class="row">

            <div class="col-6" id="linn"  style="margin-top: 1%;">
              <div class="" style="  margin-left: -5%;">
                <span>
                   <label class="title" style="margin-top:3%;">Titre :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->titre}}</label>
                </span>
              </div>

              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title">Ville :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->ville}}</label>
                </span>
              </div>
            </div>

            <div class="col-6" class="margni"  style="  margin-top: -2%;">
              <div>
                <span>
                   <label class="title" style="margin-top:10%;">Categorie :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->contrat}}</label>
                </span>
              </div>
              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title">Salaire :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->salaire}}</label>
                </span>
              </div>
            </div>

          </div>


              <div class="" style="  margin-left: 1%;margin-top:2%;">
                <span>
                   <label class="title" >Le profile rechercher :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->profile}}</label>
                </span>
              </div>
              <div class="" style="  margin-left: 1%;">
                <span class="title">
                   L'entreprise :
                </span>
                <span class="donné">
                   {{$emploi->entreprise}}
                </span>
              </div>
              <div class="" style="  margin-left: 1%;">
                <span>
                   <label class="title">Le poste :</label>
                </span>
                <span>
                   <label class="donné">{{$emploi->poste}}</label>
                </span>
              </div>

              <div style="text-align:right">

                  <a href="{{url('/emplois/'.$emploi->id.'/cvs/index')}}" class="btn btn-success pull-right col-3 " style="margin-right:40px;">Inscription</a>

              </div>

        </div>
    </div>
    </div>
  </div>
@endsection
