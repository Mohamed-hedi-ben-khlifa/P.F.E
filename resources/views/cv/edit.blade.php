@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/cv.css') }}" rel="stylesheet">

  <div class="container" id="app" style="margin-top:5%;">
    <div class="page">
      <div class="row" >

      <div class="col-1">
        <div class="row">
          <div class="col-md-12" style="height:250px;background-color:#01161E;margin-top:25px;margin-left:15px">

          </div>
        </div>
      </div>
      <div class="col-md-3" style="width:30%;background-color:#5C94A8;margin-left:-15px">
        <div ><img src="/{{ Auth::user()->avatar }}" class="cercle"> </div>
        <div class="titre">
          Contact
        </div>


        <div class="row">
          <div class="col-4">
            <div class="icon">
            </div>
          </div>
          <div class="col-8">
            <input type="text" class="form-control col-md-12" name=""  id="donne" v-model="cv.telephone" value="@{{cv.telephone}}">

            @if($errors->get('telephone'))
                @foreach($errors->get('telephone') as $message)
                        <li>{{ $message }}</li>
                @endforeach
            @endif

          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <div class="icon1">
            </div>
          </div>
          <div class="col-8">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="cv.email" value="@{{cv.email}}">

            @if($errors->get('email'))
                @foreach($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                @endforeach
            @endif

          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <div class="icon2">
            </div>
          </div>
          <div class="col-8">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="cv.ville" value="@{{cv.ville}}">

            @if($errors->get('email'))
                @foreach($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                @endforeach
            @endif

          </div>
        </div>

        <div class="line"></div>
<div v-for="competance in competances">


        <div class="titre" >
          Languages
        </div>
        <div class="row">
          <div class="col-5">
            <p class="langue">Anglais</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne"   v-model="competance.p9" value="@{{competance.p9}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-warning" role="progressbar"  v-bind:style="{'width':competance.p9+'%'}"   aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
          <div class="col-5">
            <p class="langue">Francais</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p10" value="@{{competance.p10}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-warning" role="progressbar"  v-bind:style="{'width':competance.p10+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
          <div class="col-5">
            <p class="langue">Arabe</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p11" value="@{{competance.p11}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-warning" role="progressbar"  v-bind:style="{'width':competance.p11+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
          <div class="col-5">
            <p class="langue">Allemand</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p12" value="@{{competance.p12}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;margin-bottom:20%;">
          <div class="progress-bar  progress-bar-striped bg-warning" role="progressbar"  v-bind:style="{'width':competance.p12+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="line"></div>

        <div class="titre" >
          Personalité
        </div>

        <div class="row">
          <div class="col-5">
            <p class="languee">Creatif</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p5" value="@{{competance.p5}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-danger" role="progressbar"  v-bind:style="{'width':competance.p5+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
          <div class="col-5">
            <p class="languee">Dinamique</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p6" value="@{{competance.p6}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-danger" role="progressbar"  v-bind:style="{'width':competance.p6+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
          <div class="col-5">
            <p class="languee">Organisé</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p7" value="@{{competance.p7}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-danger" role="progressbar"  v-bind:style="{'width':competance.p7+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="row">
          <div class="col-5">
            <p class="languee">Autonome</p>
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p8" value="@{{competance.p8}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;margin-bottom:20%;">
          <div class="progress-bar  progress-bar-striped bg-danger" role="progressbar"  v-bind:style="{'width':competance.p8+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="line"></div>

        <div class="titre" >
          Competance
        </div>

        <div class="row">
          <div class="col-5">
            <input type="text" class="form-control col-md-12" style="margin-left:15%;" name="" id="donne" v-model="competance.c1" value="@{{competance.c1}}">
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p1" value="@{{competance.p1}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-success" role="progressbar"  v-bind:style="{'width':competance.p1+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
          <div class="col-5">
            <input type="text" class="form-control col-md-12" style="margin-left:15%;" name="" id="donne" v-model="competance.c2" value="@{{competance.c2}}">
          </div>
          <div class="col-7">
            <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p2" value="@{{competance.p2}}">
          </div>
        </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-success" role="progressbar"  v-bind:style="{'width':competance.p2+'%'}"aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

      <div class="row">
        <div class="col-5">
          <input type="text" class="form-control col-md-12" style="margin-left:15%;" name="" id="donne" v-model="competance.c3" value="@{{competance.c3}}">
        </div>
        <div class="col-7">
          <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p3" value="@{{competance.p3}}">
        </div>
          </div>
        <div class="progress" style="margin-left:4%;">
          <div class="progress-bar  progress-bar-striped bg-success" role="progressbar"  v-bind:style="{'width':competance.p3+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>


      <div class="row">
        <div class="col-5">
          <input type="text" class="form-control col-md-12" style="margin-left:15%;" name="" id="donne" v-model="competance.c4" value="@{{competance.c4}}">
        </div>
        <div class="col-7">
          <input type="text" class="form-control col-md-12" name="" id="donne" v-model="competance.p4" value="@{{competance.p4}}">
        </div>
          </div>
        <div class="progress" style="margin-left:4%;margin-bottom:25px;">
          <div class="progress-bar  progress-bar-striped bg-success" role="progressbar"  v-bind:style="{'width':competance.p4+'%'}" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

</div>


      </div>
      <div class="col-md-8" style="width:60%;">

        <div class="row">

          <div class="col-md-12" style="height:250px;background-color:#01161E;margin-top:25px;">
            <div class="">
              <a  href="{{url ('profiles')}}"  type="submit" @click="updatecompetance" class="closes" data-dismiss="modal" style="background:transparent;" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a >
            </div>

            <div class="nom" >
              <div class="row">
                <div class="col-1"></div>
                  <div class="col-10">
                  <input type="text" name="" id="nom" v-model="cv.nom" value="@{{cv.nom}}" class="col-12" style="text-align:center">

                  @if($errors->get('nom'))
                      @foreach($errors->get('nom') as $message)
                              <li>{{ $message }}</li>
                      @endforeach
                  @endif

                </div>
              </div>
            </div>
            <div class="fonction">
              Programmeur
            </div>
          </div>
        </div>
        <div class="container">

          <div class="cadre">
            <div class="row">
              <div class="col-md-8">
                <span class="titre1" >
                  Education
                </span>
              </div>
              <div class="col-md-2">
                <a href="#"><div class="add_f" @click="addformation,add=true,update=false"></div></a>
              </div>
              <div class="col-md-2">
                <div class="icon3" ></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" v-if="add">

              <div class="card" style="margin-top:2%;">
                <div class="card-body">
                  <button type="button" @click="add=false,update=false" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="form-group">
                    {{ csrf_field() }}
                    <input type="text" class="form-control col-md-12 m-2 mt-3"         v-model="formation.titre" name="" value="" placeholder="Saisie votre titre">
                    <input type="text" class="form-control col-md-12 m-2 "             v-model="formation.socite" name="" value="" placeholder="Nom du l'ecole">
                    <textarea type="text" class="form-control col-md-12 m-2"           v-model="formation.description" name="" value="" placeholder="description"></textarea>
                    <div class="row">
                      <div class="cil-6">
                        <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="formation.date_d" name="" value="" placeholder="date debut">
                      </div>
                      <div class="col-6">
                        <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="formation.date_f" name="" value="" placeholder="date fin">
                      </div>
                    </div>
                  </div>

                  <a href="#"  class="btn btn-primary col-md-12" @click="addformation,add=false">Ajouter</a>
                </div>
              </div>
            </div>
          </div>


          <div class="education" v-for="formation in formations">


            <div class="row">
              <div class="col-md-12" v-if="update">

                <div class="card" style="margin-top:2%;">
                  <div class="card-body">
                    <button type="button" @click="add=false,update=false" class="close" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="form-group">
                      {{ csrf_field() }}
                      <input type="text" class="form-control col-md-12 m-2 mt-3"         v-model="formation.titre" name="" value="" placeholder="Saisie votre titre">
                      <input type="text" class="form-control col-md-12 m-2 "             v-model="formation.socite" name="" value="" placeholder="Nom du l'ecole">
                      <textarea type="text" class="form-control col-md-12 m-2"           v-model="formation.description" name="" value="" placeholder="description"></textarea>
                      <div class="row">
                        <div class="cil-6">
                          <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="formation.date_d" name="" value="" placeholder="date debut">
                        </div>
                        <div class="col-6">
                          <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="formation.date_f" name="" value="" placeholder="date fin">
                        </div>
                      </div>
                    </div>

                    <a href="#" class="btn btn-success col-md-12" @click="updateformation,update=false">Modifier</a>

                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-8">
                <p class="formation">@{{formation.titre}} hfdgs</p>
              </div>
              <div class="col-md-2">
                <p class="date">@{{formation.date_d}}</p>
              </div>
              <div class="col-md-2">
                <p class="date">@{{formation.date_f}}</p>
              </div>
            </div>
            <p class="ecole">@{{formation.socite}}</p>
            <div class="row">
              <div class="col-11">
                <p class="description">@{{formation.description}}</p>
              </div>
              <div class="col-1" style="margin-top:-2%;">
                <a href="#"><div class="delete" @click="deleteformation(formation)"></div></a>
                <a href="#"><div class="update" @click="editformation(formation),update=true,add=false"></div></a>
                <a href="#"><div class="add" @click="addformation,add=true,update=false"></div></a>
              </div>
            </div>
          </div>

        <div class="cadre">
          <div class="row">
            <div class="col-md-8">
              <div class="titre1" >
                Experience profitionnel</div>
              </div>
              <div class="col-md-2">
                <a href="#"><div class="add_f" @click="addformation,add=true,update=false"></div></a>
              </div>
              <div class="col-md-2">
                <div class="icon4" ></div>
              </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12" v-if="add">

            <div class="card" style="margin-top:2%;">
              <div class="card-body">
                <button type="button" @click="add=false,update=false" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-group">
                  {{ csrf_field() }}
                  <input type="text" class="form-control col-md-12 m-2 mt-3"         v-model="experience.titre" name="" value="" placeholder="Saisie votre titre">
                  <input type="text" class="form-control col-md-12 m-2 "             v-model="experience.socite" name="" value="" placeholder="Nom du l'ecole">
                  <textarea type="text" class="form-control col-md-12 m-2"           v-model="experience.description" name="" value="" placeholder="description"></textarea>
                  <div class="row">
                    <div class="cil-6">
                      <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="experience.date_d" name="" value="" placeholder="date debut">
                    </div>
                    <div class="col-6">
                      <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="experience.date_f" name="" value="" placeholder="date fin">
                    </div>
                  </div>
                </div>
                <a href="#"  class="btn btn-primary col-md-12" @click="addexperience,add=false">Ajouter</a>
              </div>
            </div>
          </div>
        </div>
      <div v-for="experience in experiences">

        <div class="row">
          <div class="col-md-12" v-if="update">

            <div class="card" style="margin-top:2%;">
              <div class="card-body">
                <button type="button" @click="add=false,update=false" class="close" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <div class="form-group">
                  {{ csrf_field() }}
                  <input type="text" class="form-control col-md-12 m-2 mt-3"         v-model="experience.titre" name="" value="" placeholder="Saisie votre titre">
                  <input type="text" class="form-control col-md-12 m-2 "             v-model="experience.socite" name="" value="" placeholder="Nom du l'ecole">
                  <textarea type="text" class="form-control col-md-12 m-2"           v-model="experience.description" name="" value="" placeholder="description"></textarea>
                  <div class="row">
                    <div class="cil-6">
                      <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="experience.date_d" name="" value="" placeholder="date debut">
                    </div>
                    <div class="col-6">
                      <input type="date" class="form-control col-md-11 ml-5 m-2"     v-model="experience.date_f" name="" value="" placeholder="date fin">
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-success col-md-12" @click="updateexperience,update=false">Modifier</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <p class="formation">@{{experience.titre}} </p>
          </div>
          <div class="col-md-2">
            <p class="date">@{{experience.date_d}}</p>
          </div>
          <div class="col-md-2">
            <p class="date">@{{experience.date_f}}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-11">
            <p class="description">@{{experience.description}}</p>
          </div>
          <div class="col-1" style="margin-top:-2%;">
            <a href="#"><div class="delete" @click="deleteexperience(experience)"></div></a>
            <a href="#"><div class="update" @click="editexperience(experience),update=true,add=false"></div></a>
            <a href="#"><div class="add" @click="addexperience,add=true,update=false"></div></a>
          </div>
        </div>
      </div>


        </div>
      </div>
    </form>
    </div>
  </div>




@endsection

@section('javascripts')



<script >
var ids = <?php echo json_encode($id); ?>;
console.log(ids);

    var app = new Vue ({
      el: '#app',
      data:{

            add:false,
            update:false,
            description:false,
            cvs: [],
            cv: {
              id:ids,
              nom:'',
              prenom:'',
              description:'',
              ville:'',
              email:'',
              telephone:0
            },
            experiences: [],
            experience: {
              id:0,
              cv_id:ids,
              titre:'',
              socite:'',
              descriptipn:''
            },
            formations: [],
            formation: {
              id:0,
              cv_id:ids,
              titre:'',
              socite:'',
              descriptipn:''
            },
            competances: [],
            competance: {
              id:0,
              cv_id:ids,
              p1:'',
              p2:'',
              p3:'',
              p4:'',
              p5:'',
              p6:'',
              p7:'',
              p8:'',
              p9:'',
              p10:'',
              p11:'',
              p12:'',
              c1:'',
              c2:'',
              c3:'',
              c4:''
            },
            cv_id:ids
          },

        created(){
          this.getcvs();
          this.getexperiences();
          this.getformations();
          this.getcompetances();
        },
        methods:{
          getcvs:function(){
            axios.get('/getcv/'+ids)
              .then (response => {
                this.cvs = response.data;
                this.cv=this.cvs
              })
              .catch(error => {
                console.log(error);
              })
          },
          getexperiences:function(){
            axios.get('/getexperiences/'+ids)
              .then (response => {
                this.experiences = response.data;
                this.experience=this.experiences;
              })
              .catch(error => {
                console.log(error);
              })
          },
          getformations:function(){
            axios.get('/getformations/'+ids)
              .then (response => {
                this.formations = response.data;
                this.formation=this.formations;
              })
              .catch(error => {
                console.log(error);
              })
          },
          getcompetances:function(){
            axios.get('/getcompetances/'+ids)
              .then (response => {
                this.competances = response.data;
                this.competance=this.competances;
              })
              .catch(error => {
                console.log(error);
              })
          },
          addexperience: function(){
          axios.post('/cvs/'+ids+'/addexperience',this.experience)
          .then(response => {

              this.experience.id = response.data.id;
              this.experiences.unshift(this.experience);

              this.experience =  {
                                              id:0,
                                              cv_id:ids,
                                              titre:'',
                                              socite:'',
                                              descriptipn:''
                                            };

          })
          .catch( error => {
            console.log('error:', error);
          })
        },
        addformation: function(){
        axios.post('/cvs/'+ids+'/addformation',this.formation)
        .then(response => {

            this.formation.id = response.data.id;
            this.formations.unshift(this.formation);

            this.formation =  {
                                            id:0,
                                            cv_id:ids,
                                            titre:'',
                                            socite:'',
                                            descriptipn:''
                                          };

        })
        .catch( error => {
          console.log('error:', error);
        })
      },
      addcompetance: function(){
      axios.post('/cvs/'+ids+'/addcompetance',this.competance)
      .then(response => {

          this.competance.id = response.data.id;
          this.competances.unshift(this.competance);

          this.competance =  {
                                id:0,
                                cv_id:ids,
                                p1:'',
                                p2:'',
                                p3:'',
                                p4:'',
                                p5:'',
                                p6:'',
                                p7:'',
                                p8:'',
                                p9:'',
                                p10:'',
                                p11:'',
                                p12:'',
                                c1:'',
                                c2:'',
                                c3:'',
                                c4:''
                              }

            })
            .catch( error => {
              console.log('error:', error);
            })
          },
          editexperience: function(experience){

            this.experience=experience;
          },
          editformation: function(formation){

            this.formation=formation;
          },
          editcompetance: function(competance){

            this.competance=competance;
          },
          editcv: function(cv){

            this.cv=cv;
          },
          updateexperience: function (){
            axios.put('/cvs/'+this.cv.id+'/updateexperience',this.experience)
            .then(response => {
              if(response.data.etat){
                this.experience = {
                  expereince: {
                                id:0,
                                cv_id:ids,
                                titre:'',
                                socite:'',
                                descriptipn:''
                              }
                }
            }})
            .catch( error => {
              console.log('error:', error);
            })
          },
          updatecv: function (){
            axios.put('/cvs/'+this.cv.id+'/updatecv',this.cv)
            .then(response => {
              if(response.data.etat){
                this.cv = {
                  cv: {
                                id:0,
                                cv_id:ids,
                                titre:'',
                                socite:'',
                                descriptipn:''
                              }
                }
            }})
            .catch( error => {
              console.log('error:', error);
            })
          },
          deleteexperience: function (experience){
            axios.delete('/cvs/deleteexperience/'+experience.id)
            .then(response => {

                        var position = this.experiences.indexOf(experience);
                        this.experiences.splice(position,1);

            })
            .catch( error => {
              console.log('error:', error);
            })
          },
          updateformation: function (){
            axios.put('/cvs/'+ids+'/updateformation',this.formation)
            .then(response => {
              if(response.data.etat){
                this.formation = {
                  expereince: {
                                id:0,
                                cv_id:this.cv.id,
                                titre:'',
                                socite:'',
                                descriptipn:''
                              }
                }
            }})
            .catch( error => {
              console.log('error:', error);
            })
          },
          deleteformation: function (formation){
            axios.delete('/cvs/deleteformation/'+formation.id)
            .then(response => {

                        var position = this.formations.indexOf(formation);
                        this.formations.splice(position,1);

            })
            .catch( error => {
              console.log('error:', error);
            })
          },
          updatecompetance: function (){
            axios.put('/cvs/'+ids+'/updatecompetance',this.competance)
            .then(response => {
              if(response.data.etat){
                this.competance = {
                  competance: {

                                  id:0,
                                  cv_id:ids,
                                  p1:'',
                                  p2:'',
                                  p3:'',
                                  p4:'',
                                  p5:'',
                                  p6:'',
                                  p7:'',
                                  p8:'',
                                  p9:'',
                                  p10:'',
                                  p11:'',
                                  p12:'',
                                  c1:'',
                                  c2:'',
                                  c3:'',
                                  c4:''
                                }
                }
            }})
            .catch( error => {
              console.log('error:', error);
            })
          },
          deletecompetance: function (competance){
            axios.delete('/tests/deletecompetance/'+competance.id)
            .then(response => {

                        var position = this.competances.indexOf(competance);
                        this.competances.splice(position,1);

            })
            .catch( error => {
              console.log('error:', error);
            })
          }
          }
    });
</script>


@endsection
