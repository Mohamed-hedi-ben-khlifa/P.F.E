@extends('layouts.app')


@section('content')
<link href="{{ asset('css/cvs.css') }}" rel="stylesheet">
<div class="carde" id="app" style="margin-top:3.2%;">
  <div class="filtre" id="fil">
    <div class="container">

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>


        <span class="catt" style="margin-left: 3%;">Experience professionnelle</span>

        <form  action="{{url('cvs/'.$cv->id.'/experiences')}}" method="post">


          <div class="row">
              {{ csrf_field() }}
              <div class="com-md-1">

              </div>
              <div class="col-md-10" style="margin-left: 12%;">

                <label for="inp2" class="name" >Titre </label>
                <input type="text" id="inp2" name="titre" class="col-md-10 na"  placeholder=" Experience en .." v-model="experience.titre">
                <div class="linee"></div>

                @if($errors->get('titre'))
                    @foreach($errors->get('titre') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

                <label for="inp2" class="name">Socité</label>
                <input type="text" id="inp2" name="socite" class="col-md-10 na" placeholder=" Proxy,sts,steg,"  v-model="experience.socite">
                <div class="linee"></div>

                @if($errors->get('socite'))
                    @foreach($errors->get('socite') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

                <label for="inp2" class="name" >Description </label>
                <textarea type="text"  rows="1" name="description" style="margin-bottom:-1.5%;" id="inp2" class="col-md-10 na"
                     placeholder="L'expérience professionnelle du candidat et sa motivation sont deux éléments cls sur lesquels le jury va porter son appréciation.
                     Ces deux points devront être préparés avec soin et présentés sous une forme organisée." v-model="experience.description">
               </textarea>
                <div class="linee"></div>

                @if($errors->get('description'))
                    @foreach($errors->get('description') as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                @endif

                <div class="row">
                  <div class="col-md-6">
                    <label for="inp2" class="name">Date debut</label>
                    <input type="date" id="inp2" name="date_d" class="col-md-8 na" v-model="experience.date_d">
                    <div class="line"></div>

                    @if($errors->get('date_d'))
                        @foreach($errors->get('date_d') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                  </div>
                  <div class="col-md-1" id="lin"></div>
                  <div class="col-md-5">
                    <label for="inp2" class="name">Date fin </label>
                    <input type="date" id="inp2" name="date_f" class="col-md-8 na" v-model="experience.date_f">
                    <div class="line"></div>

                    @if($errors->get('date_f'))
                        @foreach($errors->get('date_f') as $message)
                                <li>{{ $message }}</li>
                        @endforeach
                    @endif

                  </div>
                </div>

              </div>
              <div class="col-md-1">

              </div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
              <div class="espace"><div class="col-sm"></div></div>
          </div>


          <div class="col-md-12" style="text-align:right ">
            <a href="#" class="btn btn-dark col-md-3 m-1 mr-5" @click="addexperience"> + Experience</a>

          </div>
          <div class="col-md-12" style="text-align:right ">

            <input type="submit" class="btn btn-success col-md-3 m-1 mr-5" value="Suivant >" >
          </div>


    </form>

    <div class="espace"><div class="col-sm"></div></div>
    </div>
    </div>
    </div>



    @endsection

        @section('javascripts')




        <script >
        var ids = <?php echo json_encode($cvId); ?>;
        console.log(ids);

                  var app = new Vue ({
                    el: '#app',
                    data:{
                      experiences: [],
                      experience: {
                        id:0,
                        cv_id:ids,
                        titre:'',
                        socite:'',
                        descriptipn:''
                      }
                    },
                methods:{
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
                  }
                  }
                  });
        </script>


        @endsection
