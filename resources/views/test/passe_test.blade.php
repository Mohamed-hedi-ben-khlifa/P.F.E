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
        <span style="color;#121212;">Ce test de niveau est obligatoire et ne peut pas durer plus que 15 minutes pour répondre à toute les questions en sélectionnant une ou plusieurs choix pour chacune.</span>
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


                  <div class="linex">
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
            <div class="" >
              <a href="{{route('home')}}" class="btn btn-danger col-md-12 mb-3"  >Treminer</a>
            </div>
          </div>
            <div class="col-md-1"></div>
        </div>

</div>
<link href="{{ asset('css/test.css') }}" rel="stylesheet">

@endsection

@section('javascripts')


<script >

    var ids = {!! json_encode($test->id) !!};
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
