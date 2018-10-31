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

          <h1 style="margin-top:-2%;">La liste des cvs</h1>




            <div class="row" style="width:100%;margin-top:-2%;">
            <div class="col-12">
              <div class="card" style="width:100%;height:470px;">
                <div class="row m-2">
                  <div class="col-10">
                    <div class="x">
                      Mes Cvs
                    </div>
                  </div>
                  <div class="col-2">
                    <div style="text-align:right">

                        <a href="{{url('cvs/create')}}" class="btn btm-sm btn-success ">Nouveau Cv</a>
                      
                    </div>
                  </div>
                </div>

                <table class="table mt-4">
                  <div class="container">
                  <head>
                    <tr>
                      <th>Nom</th>
                      <th>E-Mail</th>
                      <th>Ville</th>
                      <th>Telephone</th>
                      <th>Action</th>
                    </tr>
                  </head>
                  <body>
                    @foreach($cvs as $cv)
                    <tr>
                      <td style="width:20%;">{{ $cv->nom }}</td>
                      <td style="width:20%;">{{ $cv->email}}</td>
                      <td style="width:20%;">{{ $cv->ville}}</td>
                      <td style="width:20%;">{{ $cv->telephone}}</td>
                      <td style="width:10%;">
                        <form action="{{url('cvs/'.$cv->id)}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}

                            <div class="row">
                              <div class="col-4">
                                <a href="{{ url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/tests/show_tests' )}}"><div class="adds"></div></a>
                              </div>
                            </div>

                        </form>
                      </td>
                    </tr>
                    @endforeach
                    </body>
                    </div>
                  </table>
                  {{ $cvs->links() }}


            </div>
          </div>
          </div>

        </div>
      </div>
    </div>

    @endsection
