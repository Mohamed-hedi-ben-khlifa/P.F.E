@extends('layouts.app')


@section('content')


    <div class="container" >
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

          <h1>La liste des users</h1>


          <table class="table">
            <head>
              <tr>
                <th>nom</th>
                <th>mail</th>
                <th>Action</th>
              </tr>
            </head>

            <body>


              @foreach($users as $user)
              <tr>
                <td>{{ $user->nom }}</td>

                <td>{{ $user->email}}</td>

                <td>

                  <form action="{{url('users/'.$user->id)}}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}

                       <a href="{{ url('users/'.$user->id.'/profile' )}}" class="btn btn-primary">Details</a>

                      @if (Auth::user()->is_admin == 1)
                        <a href="#" class="btn btn-success col-md-3">Editer</a>
                      @endif

                      @if (Auth::user()->is_admin == 1)
                      <button type="submit" class="btn btn-danger">Supprimer</button>
                      @endif
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
