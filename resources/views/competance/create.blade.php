@extends('layouts.app')


@section('content')
<link href="{{ asset('css/cvs.css') }}" rel="stylesheet">
<div class="carde" id="app" style="margin-top:3.2%;">
  <div class="filtre" id="fil">
    <div class="container">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>


        <span class="catt" style="margin-left: 3%;">Competance</span>


      <form  action="{{url('cvs/'.$cv->id.'/competances')}}" method="post">

        <div class="row">

            {{ csrf_field() }}
            <div class="col-md-10" style="margin-left: 10%;margin-top: -1%">
              <div class="row">
                <div class="col-md-4 " >
                  <p class="sous_titre" style="margin-bottom:0.5%;">Professionnelles</p>
                  <div class="espace">
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" name="c1" v-model="competance.c1"  placeholder="Exemple React" class="c_porfessionnel">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="p1" v-model="competance.p1" placeholder="10%" class="valeur">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;margin-top:4%;margin-bottom:0.5%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p1+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('c1'))
                        @foreach($errors->get('c1') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                    @if($errors->get('p1'))
                        @foreach($errors->get('p1') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif
                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" name="c2" v-model="competance.c2" placeholder="Exemple C#" class="c_porfessionnel">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="p2" v-model="competance.p2" placeholder="60%" class="valeur">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;margin-top:4%;margin-bottom:0.5%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar" v-bind:style="{'width':competance.p2+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>

                                        @if($errors->get('c2'))
                                            @foreach($errors->get('c2') as $message)
                                                    <li>{{ $message }}</li>
                                            @endforeach
                                        @endif

                                        @if($errors->get('p2'))
                                            @foreach($errors->get('p2') as $message)
                                                    <li>{{ $message }}</li>
                                            @endforeach
                                        @endif


                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" name="c3" v-model="competance.c3" placeholder="Exemple CSS" class="c_porfessionnel">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="p3" v-model="competance.p3" placeholder="30%" class="valeur">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;margin-top:4%;margin-bottom:0.5%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p3+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('c3'))
                        @foreach($errors->get('c3') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                    @if($errors->get('p3'))
                        @foreach($errors->get('p3') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                    <div class="row">
                      <div class="col-md-6">
                        <input type="text" name="c4" v-model="competance.c4" placeholder="Exemple HTML" class="c_porfessionnel">
                      </div>
                      <div class="col-md-6">
                        <input type="text" name="p4" v-model="competance.p4" placeholder="80%" class="valeur">
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;margin-top:4%;margin-bottom:0.5%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p4+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('c4'))
                        @foreach($errors->get('c4') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                    @if($errors->get('p4'))
                        @foreach($errors->get('p4') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                  </div>
                </div>
                <div class="col-md-4">
                  <p class="sous_titre">Personnelles</p>
                  <div class="espace">

                    <div class="row">
                      <div class="col-md-4">
                        <p class="langue">Créatif</p>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="p5" v-model="competance.p5" placeholder="75%" class="valeur">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p5+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('p5'))
                        @foreach($errors->get('p5') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif
                    <div class="row">
                      <div class="col-md-4">
                        <p class="langue">Dinamique</p>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="p6" v-model="competance.p6" placeholder="10%" class="valeur">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p6+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('p6'))
                        @foreach($errors->get('p6') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif
                    <div class="row">
                      <div class="col-md-4">
                        <p class="langue">Organisé</p>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="p7" v-model="competance.p7" placeholder="55%" class="valeur">
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p7+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('p7'))
                        @foreach($errors->get('p7') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                    <div class="row">
                      <div class="col-md-4">
                        <p class="langue">Autonome</p>
                      </div>
                      <div class="col-md-8">
                        <input type="text" name="p8" v-model="competance.p8" placeholder="22%" class="valeur">
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-9" style="margin-left:12%;">
                        <div class="progress ">
                          <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p8+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                    @if($errors->get('p8'))
                        @foreach($errors->get('p8') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif
                  </div>
                </div>
                <div class="col-md-4">
                  <p class="sous_titre">Langues</p>
                  <div class="espace">

                  <div class="row">
                        <div class="col-md-4">
                          <p class="langue">Anglais</p>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="p9" v-model="competance.p9" placeholder="22%" class="valeur">
                        </div>
                      </div>



                      <div class="row">
                        <div class="col-md-9" style="margin-left:12%;">
                          <div class="progress ">
                            <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p9+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>

                      @if($errors->get('p9'))
                          @foreach($errors->get('p9') as $message)
                                  <li>{{ $message }}</li>
                          @endforeach
                      @endif

                      <div class="row">
                        <div class="col-md-4">
                            <p class="langue">Français </p>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="p10" v-model="competance.p10" placeholder="22%" class="valeur">
                        </div>
                      </div>



                      <div class="row">
                        <div class="col-md-9" style="margin-left:12%;">
                          <div class="progress ">
                            <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p10+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>

                      @if($errors->get('p10'))
                          @foreach($errors->get('p10') as $message)
                                  <li>{{ $message }}</li>
                          @endforeach
                      @endif

                      <div class="row">
                        <div class="col-md-4">
                          <p class="langue">Arabe    </p>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="p11" v-model="competance.p11" placeholder="22%" class="valeur">
                        </div>
                      </div>



                      <div class="row">
                        <div class="col-md-9" style="margin-left:12%;">
                          <div class="progress ">
                            <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p11+'%'}" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>

                      @if($errors->get('p11'))
                          @foreach($errors->get('p11') as $message)
                                  <li>{{ $message }}</li>
                          @endforeach
                      @endif

                      <div class="row">
                        <div class="col-md-4">
                          <p class="langue">Allemand </p>
                        </div>
                        <div class="col-md-8">
                          <input type="text" name="p12" v-model="competance.p12" placeholder="22%" class="valeur">
                        </div>
                      </div>




                      <div class="row">
                        <div class="col-md-9" style="margin-left:12%;">
                          <div class="progress ">
                            <div class="progress-bar progress-bar-striped bg-secondary" role="progressbar"  v-bind:style="{'width':competance.p12+'%'}"aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      @if($errors->get('p12'))
                          @foreach($errors->get('p12') as $message)
                                  <li>{{ $message }}</li>
                          @endforeach
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12" style="text-align:right ">

              <input type="submit" class="btn  col-md-2 " value="Suivant >" >
            </div>
          </form>

        <div class="espace"><div class="col-sm"></div></div>
      </div>
    </div>
  </div>

          <link href="{{ asset('css/competance.css') }}" rel="stylesheet">

@endsection



@section('javascripts')

<script >
var ids = <?php echo json_encode($cvId); ?>;
console.log(ids);


  var app = new Vue ({
    el: '#app',
    data:{
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
        methods:{
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
                }

      }
  });
</script>


@endsection
