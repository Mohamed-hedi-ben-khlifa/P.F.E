@extends('layouts.app')


@section('content')

<link href="{{ asset('css/users.css') }}" rel="stylesheet">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">

<div class="container" style="margin-top:6%;">
  <div class="row">
    <div class="col-md-12">

        @if(session()->has('success'))
          <div class="alert alert-success">
            {{session()->get('success')}}
          </div>
          @endif
          @if(session()->has('supprimer'))
          <div class="alert alert-danger">
            {{session()->get('supprimer')}}
          </div>
          @endif
          @if(session()->has('edit'))
          <div class="alert alert-success">
            {{session()->get('edit')}}
          </div>
          @endif

          <h1 style="margin-top:-2%;">La liste des offres d'emplois</h1>



          <div class="row" style="width:100%;margin-top:-2%;">

          <div class="col-12">
          <div class="card" style="width:100%;height:470px;">
            <div class="row">
              <div class="col-10">
                <div class="x">
                  Les Offres D'emplois
                </div>
              </div>
              <div class="col-2">
              
              </div>
            </div>

            <table class="table ">
              <head>
                <tr>
                  <th>Titre</th>
                  <th>Categorie</th>
                  <th>Ville</th>
                  <th>Salaire</th>
                  <th>Action</th>
                </tr>
              </head>
              <body>
                @foreach($emplois as $emploi)
                <tr>
                  <td style="width:20%;">{{ $emploi->titre }}</td>
                  <td style="width:20%;">{{ $emploi->contrat }}</td>
                  <td style="width:20%;">{{ $emploi->ville }}</td>
                  <td style="width:20%;">{{ $emploi->salaire }}$/mois</td>

                  <td style="width:10%;">
                    <form action="{{url('emplois/'.$emploi->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <div class="row">
                        <div class="col-4">
                          <a href="{{ url('emplois/'.$emploi->id )}}"><div class="view"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="{{ url('emplois/'.$emploi->id.'/edit' )}}" ><div class="update"></div></a>
                        </div>
                        <div class="col-4">

                        <button type="submit" ><div class="closes"></div></button>

                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
                @endforeach
              </body>
            </table>
            {{ $emplois->links() }}
          </div>
          </div>
          </div>
    </div>
  </div>
</div>
    @endsection
