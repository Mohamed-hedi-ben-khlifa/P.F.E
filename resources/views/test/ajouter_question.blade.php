@extends('layouts.app')


@section('content')
<div class="row" id="app" style="margin-top:4%;">

   <div class="col-md-2"></div>

   <div class="col-md-8">
    <div class="cadree">

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

           <p class="cat" style="padding:5%;text-align:center;color:#000000;">test technique</p>

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
        <span style="color:#452187;">Noté bien :</span>
        <span style="color;#121212;">Ce test de niveau est obligatoire et ne peut pas durer plus que 15 minutes pour répondre à toute les questions en sélectionnant une ou plusieurs choix pour chacune.</span>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-10">
          <div class="" v-if="close">
            <a href="#" class="btn btn-primary col-md-12"  @click="close=false,open=true,edit=false" >Ajouter un question</a>
          </div>
        </div>
          <div class="col-md-1"></div>
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10" v-if="open">

          <div class="card">
            <div class="card-body">
              <button type="button" @click="open=false,close=true" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="form-group">
                {{ csrf_field() }}


                <input type="text" class="form-control col-md-11"         v-model="question.question" name="" value="" placeholder="Saisie votre question">
                <div class="form-check b-5" >
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="choix1" v-model="question.choix1">
                  <input type="text" class="form-control col-md-8 ml-5 m-2" v-model="question.reponse1" name="" value="" placeholder="Reponse N°1">
                </div>
                <div class="form-check b-5" >
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="choix2" v-model="question.choix2">
                  <input type="text" class="form-control col-md-8 ml-5 m-2" v-model="question.reponse2" name="" value="" placeholder="Reponse N°2">
                </div>
                <div class="form-check b-5" >
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck3" name="choix3" v-model="question.choix3">
                  <input type="text" class="form-control col-md-8 ml-5 m-2" v-model="question.reponse3" name="" value="" placeholder="Reponse N°3">
                </div>
                <div class="form-check b-5" >
                  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck4" name="choix4" v-model="question.choix4">
                  <input type="text" class="form-control col-md-8 ml-5 m-2" v-model="question.reponse4" name="" value="" placeholder="Reponse N°4">
                </div>
              </div>


              <a href="#" v-if="ajouter"  class="btn btn-primary col-md-12" @click="addquestion">Ajouter</a>

              <a href="#" v-else  class="btn btn-danger col-md-12" @click="updatequestion">Enregistrer</a>
            </div>
          </div>
        </div>
      </div>


      <div class="row " >
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <form class="qq">
            <ul v-for="question in questions">

              <li style="list-style-type: none;">

                <div class="form-group">
                  <label class="question">@{{question.question}}</label>
                </div>


                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" v-model="question.choix1" id="defaultCheck1">
                      <label class="reponse form-check-label ml-5" for="exampleCheck1">@{{question.reponse1}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" v-model="question.choix2" id="defaultCheck2">
                      <label class="reponse form-check-label ml-5" for="exampleCheck2">@{{question.reponse2}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" v-model="question.choix3" id="defaultCheck3">
                      <label class="reponse form-check-label ml-5" for="exampleCheck3">@{{question.reponse3}}</label>
                    </div>

                    <div class="form-check b-5" >
                      <input class="form-check-input" type="checkbox" v-model="question.choix4" id="defaultCheck">
                      <label class="reponse form-check-label ml-5" for="exampleCheck">@{{question.reponse4}}</label>
                    </div>

                  <div style="margin-left:70%;">
                    <span class="">
                      <a href="#" class="btn btn-success m-1" @click="editquestion(question),open=true,close=false,ajouter=false,edit=true" >Editer </a>
                    </span>
                    <span class="">
                      <a href="#" class="btn btn-danger m-1"   @click="deletequestion(question)">supprimer </a>
                    </span>
                  </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="linex">
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
              <a href="{{url('home')}}" class="btn btn-danger col-md-12 mb-2"  >Treminer</a>
            </div>
          </div>
            <div class="col-md-1"></div>
        </div>

</div>
<link href="{{ asset('css/test.css') }}" rel="stylesheet">

@endsection

@section('javascripts')


<script >

    var ids = {!! json_encode($testId) !!};
    console.log(ids);


    var app = new Vue ({
      el: '#app',
      data:{

            questions: [],
            open:false,
            edit:false,
            ajouter:true,
            close:true,
            question: {
              id:0,
              test_id:ids,
              question:'',
              reponse1:'',
              reponse2:'',
              reponse3:'',
              reponse4:'',
              choix1:0,
              choix2:0,
              choix3:0,
              choix4:0
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
                                reponse4:'',
                                choix1:'',
                                choix2:'',
                                choix3:'',
                                choix4:''
                              },
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
                                reponse4:'',
                                choix1:'',
                                choix2:'',
                                choix3:'',
                                choix4:''
                              },
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
