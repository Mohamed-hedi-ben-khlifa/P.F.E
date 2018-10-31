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

          <p class="cat">La liste des emplois</p>

          <div style="text-align:right">
            @if (Auth::user()->is_admin == 1)
            <a href="{{url('emplois/create')}}" class="btn btn-success pull-right ">Nouveau emploi</a>
            @endif
          </div>

  {{ $emplois->links() }}
      <table class="table table-striped">
        <head>
          <tr>
            <th>Titre</th>
            <th>Categorie</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </head>


        <body>
          @foreach($emplois as $emploi)
          <tr>
            <td>{{ $emploi->titre }}</td>
            <td>{{ $emploi->categorie }}</td>
            <td>{{ $emploi->description}}</td>
            <td>{{ $emploi->created_at}}</td>
            <td>

              <form action="{{url('emplois/'.$emploi->id)}}" method="post">

                  {{ csrf_field() }}
                  {{ method_field('DELETE')}}

                   <a href="{{ url('emplois/'.$emploi->id )}}" class="btn btn-primary">Details</a>
                           <input type="hidden" name="id" value="{{$emploi->id}}">
                  @if (Auth::user()->is_admin == 1)
                    <a href="{{ url('emplois/'.$emploi->id.'/edit' )}}" class="btn btn-success col-md-3">Editer</a>
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
