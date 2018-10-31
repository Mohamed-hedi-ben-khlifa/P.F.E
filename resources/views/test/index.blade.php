@extends('layouts.app')


@section('content')
<div id="app">


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

          <h1>La liste des tests</h1>



          <table class="table table-striped">
            <head>
              <tr>
                <th>Titre</th>
                <th>Categorietest
                <th>Date</th>
                <th>Action</th>
              </tr>
            </head>

            <body>
              @foreach($tests as $test)
              <tr>
                <td>{{ $test->titre }}</td>
                <td>{{ $test->note }}</td>

                <td>{{ $test->created_at}}</td>
                <td>

                  <form action="{{url('tests/'.$test->id)}}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}

                       <a href="{{ url('tests/'.$test->id )}}" class="btn btn-primary">Details</a>
                               <input type="hidden" name="id" value="{{$test->id}}">
                      @if (Auth::user()->is_admin == 1)
                        <a href="{{ url('tests/'.$test->id.'/edit' )}}" class="btn btn-success col-md-3">Editer</a>
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
  </div>

    @endsection


    @section('javascripts')


    <script >

        var app = new Vue ({
          el: '#app',
          data:{

                tests: [],
                test: {
                  id:0,
                  titre:'',
                  categorie:''
                },

              },

            created(){
              this.gettests();
            },
            methods:{
              gettests:function(){
                axios.get('/gettests')
                  .then (response => {
                    this.tests = response.data;
                  })
                  .catch(error => {
                    console.log(error);
                  })
              },
              deletetest: function (test){
                axios.delete('/tests/deletetest/'+test.id)
                .then(response => {

                            var position = this.tests.indexOf(test);
                            this.tests.splice(position,1);

                })
                .catch( error => {
                  console.log('error:', error);
                })
              }
            }
        });
    </script>


    @endsection
