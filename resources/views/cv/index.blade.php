@extends('layouts.app')


@section('content')

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

          <h1>La liste des cvs</h1>


          <div style="text-align:right">
            @if (Auth::user()->is_admin == 1)
              <a href="{{url('cvs/create')}}" class="btn btn-success pull-right ">Nouveau emploi</a>
            @endif
          </div>
  {{ $cvs->links() }}
          <table class="table">
            <head>
              <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>E-Mail</th>
                <th>Telephone</th>
                <th>Ville</th>
              </tr>
            </head>

            <body>

              @foreach($cvs as $cv)
              <tr>
                <td>{{ $cv->nom }}</td>
                <td>{{ $cv->prenom}}</td>
                <td>{{ $cv->email}}</td>
                <td>{{ $cv->ville}}</td>
                <td>

                  <form action="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id)}}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}

                       <a href="{{ route('show_tests' ,['emploi'=>$emploi , 'cv' =>$cv ])}}" class="btn btn-primary">Ajouter</a>

                    
                  </form>

              </td>
            </tr>
            @endforeach

            </body>
          </table>

        </div>
      </div>
    </div>

    @endsection
