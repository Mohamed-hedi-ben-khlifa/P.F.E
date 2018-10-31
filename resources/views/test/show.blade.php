@extends('layouts.app')


@section('content')
<div class="row" id="apa" style="margin-top:5%;">



   <div class="col-md-2"></div>

   <div class="col-md-8">
    <div class="cadree">

        {{ csrf_field() }}

        <div class="row" style="width:98%;margin-left:1%;">
          <div class="col-md-3" id="bq">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label  class="test">Socité </label>
              </div>
              <div class="col-md-7">
                <label type="text" class="test1">JobStore</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4">
                <label class="test">Categorie </label>
              </div>
              <div class="col-md-7">
                <label type="text" class="test1">Technique</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-3">
                <label class="test">Année </label>
              </div>
              <div class="col-md-7">
                <label type="text" class="test1">2018/2019</label>
              </div>
            </div>
          </div>
          <div class="col-md-6" id="as">

             <p class="cat" style="padding:5%;text-align:center;color:#000000;">Test sur l’orienté objet</p>

          </div>
          <div class="col-md-3" id="qb">
            <div class="row" style="padding-top:12%;">
              <div class="col-md-3 ml-4">
                <label  class="test">Note </label>
                <label class="test">Durée </label>
              </div>
              <div class="col-md-6">
                <div class="form-group" >
                <p  class="test1">.../100</p>
                <p  class="test1">15 min</p>
              </div>
              </div>
            </div>
          </div>
        </div>



      <div class="note_bien">
        <span style="color:#452187;">Noter bien :</span>
        <span style="color;#121212;">Ce test ne peut pas durer plus que 15 minutes et vous pouvez sélectionner un ou plusieurs choix </span>
      </div>




      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <form class="qq">
            <ul v-for="question in questions">

              <li style="list-style-type: none;">

                <div class="form-group">
                  <label class="question">@{{question.question}}</label>
                </div>


                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="reponse form-check-label ml-5" for="exampleCheck1">@{{question.reponse1}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                      <label class="reponse form-check-label ml-5" for="exampleCheck2">@{{question.reponse2}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                      <label class="reponse form-check-label ml-5" for="exampleCheck3">@{{question.reponse3}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck">
                      <label class="reponse form-check-label ml-5" for="exampleCheck">@{{question.reponse4}}</label>
                    </div>


                  <div class="line">
                    <div class="row">
                      <div class="col-md-12">
                      </div>
                    </div>
                  </div>

              </li>
            </ul>
          </form>

        </div>


      <div class="col-md-1"></div>
    </div>

        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-10">
              <a href="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/tests/create_notification_admin')}}" class="btn btn-danger col-md-12"  >Treminer</a>
          </div>
            <div class="col-md-1"></div>
        </div>

</div>
<link href="{{ asset('css/test.css') }}" rel="stylesheet">

@endsection

@section('javascripts')


<script >

    var ids = {!! json_encode($emploi->id) !!};
    console.log(ids);


    var apa = new Vue ({
      el: '#apa',
      data:{

            questions: [],
            question: {
              id:0,
              test_id:ids,
              question:'',
              reponse1:'',
              reponse2:'',
              reponse3:'',
              reponse4:''
            },
            question_id:''
          },

        created(){
          this.getquestions();
        },
        methods:{
          getquestions:function(){
            axios.get('/getquestions/'+ids)
              .then (response => {
                this.questions = response.data;
              })
              .catch(error => {
                console.log(error);
              })
          },
          addquestion: function(){
          axios.post('/tests/'+ids+'/addquestion',this.question)
          .then(response => {

              this.question.id = response.data.id;
              this.questions.unshift(this.question);

              this.question = {
                                id:0 ,
                                test_id:ids,
                                question:'',
                                reponse1:'',
                                reponse2:'',
                                reponse3:'',
                                reponse4:''
                              }
                              this.open=false;
                              this.close=true;
          })
          .catch( error => {
            console.log('error:', error);
          })
        },
        editquestion: function(question){
          this.close=false;
          this.edit =true;
          this.question=question;
        },
        updatequestion: function (){
          axios.put('/tests/'+ids+'/updatequestion',this.question)
          .then(response => {
            if(response.data.etat){
              this.question = {
                                id:0 ,
                                test_id:ids,
                                question:'',
                                reponse1:'',
                                reponse2:'',
                                reponse3:'',
                                reponse4:''
                              };
                              this.open=false;
                              this.close=true;
            }
          })
          .catch( error => {
            console.log('error:', error);
          })
        },
        deletequestion: function (question){
          axios.delete('/tests/deletequestion/'+question.id)
          .then(response => {

                      var position = this.questions.indexOf(question);
                      this.questions.splice(position,1);

          })
          .catch( error => {
            console.log('error:', error);
          })
        }
        }
    });
</script>


@endsection



@if (Auth::user()->is_admin == 0)
<div class="row">
  <div class="col-0.5"></div>
    <div class="col-md-3">
      <div class="cadre1" style="background:#8B9598;">
        <div class="top"></div>
        <div class="cercle"></div>
        <div class="nom">Ben Khlifa Mohamed </div>
        <div class="fonction">Developpeur </div>
        <div class="linne"></div>
        <div class="icon" style="margin-top:6%;">
          <p class="donne"> +21625300612</p>
        </div>
        <div class="icon1" >
          <p class="donne"> Mohamed@gmail.com</p>
        </div>
        <div class="icon2" >
          <p class="donne">4070,M'saken,sousse</p>
        </div>
        <div class="linne"></div>
        <input type="button" class="btn btn-darck mt-4 col-11" @click="lescvs=true,lesemplois=false,cadre=false" style="margin-left:10px;" value="Mes Cvs">
        <input type="button" class="btn btn-height mt-1 col-11" @click="lesemplois=true,lescvs=false,cadre=false" style="margin-left:10px;" value="Mes Emplois">
      </div>
    </div>
    <div class="col-9">
      <div class="cadre2" style="background:#ffffff;" v-if="cadre"></div>
      <div class="cadre2" style="background:#ffffff;" v-if="lescvs">
        <div class="top"></div>
        <div class="row">
          <div class="col-8">
            <div class="cv">Les Cvs</div>
          </div>
          <div class="col-3">
            <a href="{{route('cvs.create')}}"  class="btn btn-success col-12 pull-right ">Ajouter Un Cv</a>
          </div>
        </div>
        <table class="table">
          <div class="container">
          <head>
            <tr>
              <th>Nom</th>
              <th>E-Mail</th>
              <th>Telephone</th>
              <th>Ville</th>
            </tr>
          </head>
          <body>
            @foreach($cvs as $cv)
            <tr>
              <td>{{ $cv->nom }}</td>
              <td>{{ $cv->email}}</td>
              <td>{{ $cv->ville}}</td>
              <td>
                <form action="{{url('cvs/'.$cv->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                     <a href="{{ url('cvs/'.$cv->id )}}" class="btn btn-primary">Details</a>
                      <a href="{{ url('cvs/'.$cv->id.'/edit' )}}" class="btn btn-success col-md-3">Editer</a>

                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
              </td>
            </tr>
            @endforeach
            </body>
            </div>
          </table>
          {{ $cvs->links() }}
        </div>
        <div class="cadre2" style="background:#ffffff;" v-if="lesemplois">

          <div class="top"></div>
          <div class="row">
            <div class="col-8">
              <div class="cv">Les Emplois</div>
            </div>
            <div class="col-3">
              <a href="{{route('emplois.create')}}"  class="btn btn-success col-12 pull-right ">Ajouter Un Emploi</a>
            </div>
          </div>
          <table class="table">
            <head>
              <tr>
                <th> Nom</th>
                <th>E-Mail</th>
                <th>Adress</th>
                <th>date</th>
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
                    <a href="{{ url('emplois/'.$emploi->id.'/edit' )}}" class="btn btn-success col-md-3">Editer</a>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </body>
          </table>
          {{ $emplois->links() }}
        </div>
      </div>
      <div class="col-0.5"></div>
    </div>
    @endif
