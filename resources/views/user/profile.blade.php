@extends('layouts.app')


@section('content')

<link href="{{ asset('css/users.css') }}" rel="stylesheet">
<link href="{{ asset('css/user.css') }}" rel="stylesheet">



<div id="app">
  @if(Auth::user()->is_admin == 1)
    <div class="left-sidebar"  style="position:fixed;background:#fff;">
          <!-- Sidebar scroll-->
              <nav class="sidebar-nav active" style="background:#fff;margin-top:-10%;">
                      <div class="cercle"><a href="/users" data-toggle="modal" data-target="#users"> <img src="{{$user->avatar}}" class="class"></a> </div>
                      <div class="nom">{{$user->name}}</div>
                      <div class="fonction">Administrateur </div>
                  <div class="nav flex-column nav-pills mt-4" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="">
                    <div style="margin-left:-6%;margin-top:6%;">
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"    @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=true" id="v-notifications-tab" data-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="notification">
                            </div>
                          </div>
                          <div class="col-8">
                            Notifications
                          </div>
                        </div>
                      </a>
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=true,home=false,notification=false" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="users">
                            </div>
                          </div>
                          <div class="col-8" >
                            Candidateurs
                          </div>
                        </div>
                      </a>
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link "            @click="lescvs=true,lesemplois=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-cvs-tab" data-toggle="pill" href="#v-pills-cvs" role="tab" aria-controls="v-pills-cvs" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="cvs">
                            </div>
                          </div>
                          <div class="col-8" >
                            Cvs
                          </div>
                        </div>
                      </a>
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"             @click="lesemplois=true,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-emplois-tab" data-toggle="pill" href="#v-pills-emplois" role="tab" aria-controls="v-pills-emplois" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="emploi">
                            </div>
                          </div>
                          <div class="col-8">
                            Emplois
                          </div>
                        </div>
                      </a>
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=true,lesusers=false,home=false,notification=false" id="v-tests-tab" data-toggle="pill" href="#v-pills-tests" role="tab" aria-controls="v-pills-tests" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="tests">
                            </div>
                          </div>
                          <div class="col-8">
                            Tests
                          </div>
                        </div>
                      </a>
                      <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link active"   @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=true,notification=false" id="v-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                        <div class="row">
                          <div class="col-3">
                            <div class="setting">
                            </div>
                          </div>
                          <div class="col-8">
                            Paramètres
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-cvs" role="tabpanel" aria-labelledby="v-pills-cvs-tab"></div>
                    <div class="tab-pane fade" id="v-pills-emplois" role="tabpanel" aria-labelledby="v-pills-emplois-tab"></div>
                    <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
                    <div class="tab-pane fade" id="v-pills-tests" role="tabpanel" aria-labelledby="v-pills-tests-tab"></div>
                    <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab"></div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                  </div>
                  <div class="nombre" style="text-align:center;margin-top:10%; ">
                    <div class="row" style="margin-left:2%;">
                      <div class="col-1"></div>
                      <div class="col-3">
                        <span class="nb">{{count($emplois)}}</span>
                      </div>
                      <div class="col-3">
                        <span class="nb">{{count($notifications)}}</span>
                      </div>
                      <div class="col-3">
                        <span class="nb">{{count($users)}}</span>
                      </div>
                    </div>
                    <div class="row" style="margin-left:2%;margin-top:-3%;">
                      <div class="col-1"></div>
                      <div class="col-3">
                        <span class="sous_titre" >Emplois</span>
                      </div>
                      <div class="col-3">
                        <span class="sous_titre">Notifications</span>
                      </div>
                      <div class="col-3">
                        <span class="sous_titre">Users</span>
                      </div>
                    </div>
                  </div>
              </nav>
              <!-- End Sidebar navigation -->
        <div class="slimScrollBar" style="background: #67757c; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 30px;">
        </div>
        <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;">
        </div>
      </div>

          <!-- End Sidebar scroll-->
      <div class="row" style="width:79.4%; margin-left:18.7%;margin-bottom:-2%;margin-top:4%;margin-right:20%;">
                  <div class="col-md-3">
                      <div class="card p-30">
                          <div class="media">
                              <div class="media-left meida media-middle">
                                <div class="emploi1">

                                </div>
                              </div>
                              <div class="media-body media-text-right" style="text-align:right;">
                                  <h2>{{count($emplois)}}</h2>
                                  <p class="m-b-0">Offres</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card p-30">
                          <div class="media">
                              <div class="media-left meida media-middle">
                                  <div class="cv1">
                                  </div>
                              </div>
                              <div class="media-body media-text-right" style="text-align:right;">
                                  <h2>{{count($cvs)}}</h2>
                                  <p class="m-b-0">Cvs</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card p-30">
                          <div class="media">
                              <div class="media-left meida media-middle">
                                <div class="user1">
                                </div>
                              </div>
                              <div class="media-body media-text-right"  style="text-align:right;">
                                  <h2>{{count($users)}}</h2>
                                  <p class="m-b-0">Utilisateurs</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card p-30">
                          <div class="media">
                              <div class="media-left meida media-middle">
                                <div class="not">
                                </div>
                              </div>
                              <div class="media-body media-text-right"style="text-align:right;">
                                  <h2>{{count($notifications)}}</h2>
                                  <p class="m-b-0">Notifications</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row" style="width:81%; margin-left:19%;margin-bottom:-2%;"  v-if="home">
                <div class="card" style="width:94.5%;height:420px;padding:5%;">
                  <div class="card-two">
                      <header>
                          <div class="avatars">
                            <a href="/notification" data-toggle="modal" data-target="#users">  <img src="{{$user->avatar}}"  style="width:200px;height200px;border-radius:50%;top:30px;margin-left:39%;border: 3px solid #fff;margin-bottom:-20%;"></a>
                          </div>
                      </header>
                  <div style="margin-top:21%;">
                    <h3 style="margin-top:16%;">{{$user->name}}</h3>
                    <h4 style="font-size:20px;color:#99abb4;text-align:center;margin-top:-3%;">Administrateur</h4>
                    <div class="lines"></div>
                    <h1 style="font-size:16px;color:#99abb4;text-align:center;margin-top:-2%;">Bonjour {{$user->name}}, vous êtes l'administrateur de notre site , amusez-vous</h1>
                  </div>
                  </div>
                </div>
              </div>

              <div v-if="lestests">
                <div class="row" style="width:81%; margin-left:19%;margin-bottom:-2%;">
                    <div class="card" style="width:94.2%;height:400px;">
                      <div class="x">
                        Les Tests
                      </div>
                      <table class="table">
                        <head>
                          <tr>
                            <th>Titre</th>
                            <th>Categorie</th>
                            <th>Note</th>
                            <th>Date</th>
                            <th>Action</th>
                          </tr>
                        </head>
                        <body>
                          @foreach($tests as $test)
                          <tr>
                            <td style="width:20%;">{{ $test->titre }}</td>
                            <td style="width:20%;">{{ $test->categorie }}</td>
                            <td style="width:20%;">{{ $test->note }}/20</td>
                            <td style="width:20%;">{{ $test->created_at}}</td>
                            <td style="width:10%;">
                              <form action="{{url('tests/'.$test->id)}}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE')}}
                                  <div class="row">
                                    <div class="col-4">
                                      <a href="{{ url('tests/'.$test->id )}}"><div class="view"></div></a>
                                    </div>
                                    <div class="col-4">
                                      <a href="{{ url('tests/'.$test->id.'/edit' )}}" ><div class="update"></div></a>
                                    </div>
                                    <div class="col-4">
                                      <button class="sub" type="submit" ><div class="closes"></div></button>
                                    </div>
                                  </div>

                              </form>
                            </td>
                          </tr>
                          @endforeach

                        </body>
                      </table>
                      {{ $tests->links() }}
                    </div>
                </div>
              </div>



              <div v-if="lesusers">
              <div class="row" style="width:81%; margin-left:19%;margin-bottom:-2%;">
                  <div class="card" style="width:94.5%;height:400px;">
                    <div class="x">
                      Les Utilisateurs
                    </div>
                    <table class="table">
                      <head>
                        <tr>
                          <th> #</th>
                          <th> Nom</th>
                          <th>E-Mail</th>
                          <th>telephone</th>
                          <th>Action</th>
                        </tr>
                      </head>
                      <body>
                        @foreach($users as $user)
                        <tr>
                          <td><img src="{{$user->avatar}}" style="width:32px;height:32px;border-radius:50%;top:10px;"></td>

                          <td style="width:25%;">{{ $user->name }}</td>

                          <td style="width:25%;">{{ $user->email}}</td>

                          <td style="width:25%;">{{ $user->telephone}}</td>

                          <td>

                            <form action="{{url('users/'.$user->id)}}" method="post">

                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                <div class="row">
                                  <div class="col-4">
                                    <button class="sub" type="submit" ><div class="closes"></div></button>
                                  </div>
                                </div>
                            </form>

                        </td>
                      </tr>
                      @endforeach

                      </body>
                    </table>
                    {{ $users->links() }}
                  </div>
                </div>
              </div>



              <div v-if="lescvs">
              <div class="row" style="width:103.2%; margin-left:18.6%;margin-bottom:-2%;">
              <div class="col-9">
                <div class="card" style="width:100%;height:400px;">
                  <div class="row m-2">
                    <div class="col-10">
                      <div class="x">
                        Les Cvs
                      </div>
                    </div>
                    <div class="col-2">
                      <div style="text-align:right">
                        @if (Auth::user()->is_admin == 1)
                        <a href="{{url('cvs/create')}}" class="btn btn-success pull-right ">Nouveau cv</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <table class="table">
                    <div class="container">
                    <head>
                      <tr>
                        <th>Nom</th>
                        <th>E-Mail</th>
                        <th>Ville</th>
                        <th>Telephone</th>
                        <th>Action</th>
                      </tr>
                    </head>
                    <body>
                      @foreach($cvs as $cv)
                      <tr>
                        <td style="width:20%;">{{ $cv->nom }}</td>
                        <td style="width:20%;">{{ $cv->email}}</td>
                        <td style="width:20%;">{{ $cv->ville}}</td>
                        <td style="width:20%;">{{ $cv->telephone}}</td>
                        <td style="width:10%;">
                          <form action="{{url('cvs/'.$cv->id)}}" method="post">
                              {{ csrf_field() }}
                              {{ method_field('DELETE')}}

                              <div class="row">
                                <div class="col-4">
                                  <a href="{{ url('cvs/'.$cv->id )}}"><div class="view"></div></a>
                                </div>
                                <div class="col-4">
                                  <a href="{{ url('cvs/'.$cv->id.'/edit' )}}" ><div class="update"></div></a>
                                </div>
                                <div class="col-4">
                                  <button class="sub" type="submit" ><div class="closes"></div></button>
                                </div>
                              </div>

                          </form>
                        </td>
                      </tr>
                      @endforeach
                      </body>
                      </div>
                    </table>
                    {{ $cvs->links() }}


                </div>
              </div>
            </div>
          </div>


              <div v-if="notification">
              <div class="row" style="width:81%; margin-left:18.6%;margin-bottom:-2%;">
              <div class="card" style="width:94.5%;height:400px;">
              <div class="x">
                Les Notifications
              </div>
              <table class="table">
                <head>
                  <tr>
                    <th>#</th>
                    <th>Utilisateur</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </head>
                <body>
                  @foreach($notifications as $notification)
                  <tr>

                      <div class="">
                        <td style="width:10%;"><a href="{{url('/read')}}" data-toggle="modal" data-target="#notification" style="color:#67757c;"> <img src="{{$notification->data['avatar']}}" style="width:32px;height32px;border-radius:50%;top:10px;left:10px;"></a></td>
                        <td style="width:20%;"><a href="{{url('/read')}}" data-toggle="modal" data-target="#notification" style="color:#67757c;">{{ $notification->data['nom'] }}</a> </td>
                        <td style="width:30%;"><a href="{{url('/read')}}" data-toggle="modal" data-target="#notification" style="color:#67757c;">{{ $notification->data['message'] }}</a> </td>
                        <td style="width:20%;"><a href="{{url('/read')}}" data-toggle="modal" data-target="#notification" style="color:#67757c;">{{ $notification->created_at}}</a> </td>
                        <td style="width:10%;">

                        </td>
                      </div>

                  </tr>
                  @endforeach

                </body>
              </table>
              {{ $notifications->links() }}

              </div>
              </div>

              </div>
              <div v-if="lesemplois">
              <div class="row" style="width:81%; margin-left:18.6%;margin-bottom:-2%;">

              <div class="col-12">
              <div class="card" style="width:94%;height:400px;">
                <div class="row m-2">
                  <div class="col-10">
                    <div class="x">
                      Les Offres D'emplois
                    </div>
                  </div>
                  <div class="col-2">
                    <div style="text-align:right">
                      @if (Auth::user()->is_admin == 1)
                      <a href="{{url('emplois/create')}}" class="btn btn-success pull-right ">Nouveau emploi</a>
                      @endif
                    </div>
                  </div>
                </div>
                <table class="table mt-4">
                  <head>
                    <tr>
                      <th>Titre</th>
                      <th>Categorie</th>
                      <th>Ville</th>
                      <th>Salaire</th>
                      <th>Action</th>
                    </tr>
                  </head>
                  <body>
                    @foreach($emplois as $emploi)
                    <tr>
                      <td style="width:20%;">{{ $emploi->titre }}</td>
                      <td style="width:20%;">{{ $emploi->contrat }}</td>
                      <td style="width:20%;">{{ $emploi->ville }}</td>
                      <td style="width:20%;">{{ $emploi->salaire }}$/mois</td>

                      <td style="width:10%;">
                        <form action="{{url('emplois/'.$emploi->id)}}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE')}}
                          <div class="row">
                            <div class="col-4">
                              <a href="{{ url('emplois/'.$emploi->id )}}"><div class="view"></div></a>
                            </div>
                            <div class="col-4">
                              <a href="{{ url('emplois/'.$emploi->id.'/edit' )}}" ><div class="update"></div></a>
                            </div>
                            <div class="col-4">

                              <button class="sub" type="submit" ><div class="closes"></div></button>

                            </div>
                          </div>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </body>
                </table>
                {{ $emplois->links() }}
              </div>
              </div>
              </div>
              </div>
      @endif

      @if(Auth::user()->is_admin == 0)
             <div class="left-sidebar"  style="position:fixed;background:#fff;">
                   <!-- Sidebar scroll-->
                       <nav class="sidebar-nav active" style="background:#fff;margin-top:-10%;">
                         <div class="cercle"><a href="/users" data-toggle="modal" data-target="#users"> <img src="{{$user->avatar}}" class="class"></a> </div>
                               <div class="nom">{{$user->name}}</div>
                               <div class="fonction">Developpeur </div>
                           <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="margin-top:30%;" >
                             <div style="margin-left:-6%;">
                               <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=true" id="v-notifications-tab" data-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false">
                                 <div class="row">
                                   <div class="col-3">
                                     <div class="notification">
                                     </div>
                                   </div>
                                   <div class="col-8">
                                     Notifications
                                   </div>
                                 </div>
                               </a>
                               <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link "            @click="lescvs=true,lesemplois=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-cvs-tab" data-toggle="pill" href="#v-pills-cvs" role="tab" aria-controls="v-pills-cvs" aria-selected="true">
                                 <div class="row">
                                   <div class="col-3">
                                     <div class="cvs">
                                     </div>
                                   </div>
                                   <div class="col-8" >
                                     Cvs
                                   </div>
                                 </div>
                               </a>
                               <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link"             @click="lesemplois=true,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-emplois-tab" data-toggle="pill" href="#v-pills-emplois" role="tab" aria-controls="v-pills-emplois" aria-selected="false">
                                 <div class="row">
                                   <div class="col-3">
                                     <div class="emploi">
                                     </div>
                                   </div>
                                   <div class="col-8">
                                     Emplois
                                   </div>
                                 </div>
                               </a>
                               <a  style="color:#455a64;font-family: 'Rancho', sans-serif;height:45px;font-size: 18px;" class="nav-link active"      @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=true,notification=false" id="v-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                 <div class="row">
                                   <div class="col-3">
                                     <div class="setting">
                                     </div>
                                   </div>
                                   <div class="col-8">
                                     Paramètres
                                   </div>
                                 </div>
                               </a>
                             </div>
                           </div>
                           <div class="tab-content" id="v-pills-tabContent">
                             <div class="tab-pane fade show active" id="v-pills-cvs" role="tabpanel" aria-labelledby="v-pills-cvs-tab"></div>
                             <div class="tab-pane fade" id="v-pills-emplois" role="tabpanel" aria-labelledby="v-pills-emplois-tab"></div>
                             <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab"></div>
                             <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
                           </div>
                           <div class="nombre" style="text-align:center;margin-bottom:-10px;margin-top:24%; ">
                             <div class="row" style="margin-left:2%;">
                               <div class="col-1"></div>
                               <div class="col-3">
                                 <span class="nb">{{count($emplois)}}</span>
                               </div>
                               <div class="col-3">
                                 <span class="nb">{{count($notifications)}}</span>
                               </div>
                               <div class="col-3">
                                 <span class="nb">{{count($cvs)}}</span>
                               </div>
                             </div>
                             <div class="row" style="margin-left:2%;">
                               <div class="col-1"></div>
                               <div class="col-3">
                                 <span class="sous_titre" >Emplois</span>
                               </div>
                               <div class="col-3">
                                 <span class="sous_titre">Notifications</span>
                               </div>
                               <div class="col-3">
                                 <span class="sous_titre">Cvs</span>
                               </div>
                             </div>
                           </div>
                       </nav>
                       <!-- End Sidebar navigation -->
                 <div class="slimScrollBar" style="background: #67757c; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; left: 1px; height: 30px;">
                 </div>
                 <div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; left: 1px;">
                 </div>
               </div>
                   <!-- End Sidebar scroll-->
               <div class="row" style="width:79.4%; margin-left:18.7%;margin-bottom:-2%;margin-top:4%;">
                           <div class="col-md-4">
                               <div class="card p-30">
                                   <div class="media">
                                       <div class="media-left meida media-middle">
                                         <div class="emploi1">
                                         </div>
                                       </div>
                                       <div class="media-body media-text-right" style="text-align:right;">
                                           <h2>{{count($emplois)}}</h2>
                                           <p class="m-b-0">Offres</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <div class="card p-30">
                                   <div class="media">
                                       <div class="media-left meida media-middle">
                                           <div class="cv1">
                                           </div>
                                       </div>
                                       <div class="media-body media-text-right" style="text-align:right;">
                                           <h2>{{count($cvs)}}</h2>
                                           <p class="m-b-0">Cvs</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4">
                               <div class="card p-30">
                                   <div class="media">
                                       <div class="media-left meida media-middle">
                                         <div class="not">
                                         </div>
                                       </div>
                                       <div class="media-body media-text-right"style="text-align:right;">
                                           <h2>{{count($notifications)}}</h2>
                                           <p class="m-b-0">Notifications</p>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="row" style="width:81%; margin-left:19%;margin-bottom:-2%;"  v-if="home">
                         <div class="card" style="width:94.5%;height:420px;padding:5%;">
                           <div class="card-two">
                               <header>
                                   <div class="avatars">
                                     <a href="/notification" data-toggle="modal" data-target="#users">  <img src="{{$user->avatar}}"  style="width:200px;height200px;border-radius:50%;top:30px;margin-left:39%;border: 3px solid #fff;margin-bottom:-20%;"></a>
                                   </div>
                               </header>
                           <div style="margin-top:21%;">
                             <h3 style="margin-top:16%;">{{$user->name}}</h3>
                             <h4 style="font-size:20px;color:#99abb4;text-align:center;margin-top:-3%;">Developpeur</h4>
                             <div class="lines"></div>
                             <h1 style="font-size:16px;color:#99abb4;text-align:center;margin-top:-2%;">Bonjour {{$user->name}}, vous êtes dans votre profile , amusez-vous</h1>
                           </div>
                           </div>
                         </div>
                       </div>

                       <div v-if="lescvs">
                       <div class="row" style="width:103.2%; margin-left:18.6%;margin-bottom:-2%;">
                       <div class="col-9">
                         <div class="card" style="width:100%;height:400px;">
                           <div class="row m-2">
                             <div class="col-10">
                               <div class="x">
                                 Les Offres D'emplois
                               </div>
                             </div>
                             <div class="col-2">
                               <div style="text-align:right">
                                 @if (Auth::user()->is_admin == 1)
                                 <a href="{{url('cvs/create')}}" class="btn btn-success pull-right ">Nouveau cv</a>
                                 @endif
                               </div>
                             </div>
                           </div>
                           <table class="table">
                             <div class="container">
                             <head>
                               <tr>
                                 <th>Nom</th>
                                 <th>E-Mail</th>
                                 <th>Ville</th>
                                 <th>Telephone</th>
                                 <th>Action</th>
                               </tr>
                             </head>
                             <body>
                               @foreach($cvs as $cv)
                               <tr>
                                 <td style="width:20%;">{{ $cv->nom }}</td>
                                 <td style="width:20%;">{{ $cv->email}}</td>
                                 <td style="width:20%;">{{ $cv->ville}}</td>
                                 <td style="width:20%;">{{ $cv->telephone}}</td>
                                 <td style="width:10%;">
                                   <form action="{{url('cvs/'.$cv->id)}}" method="post">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE')}}

                                       <div class="row">
                                         <div class="col-4">
                                           <a href="{{ url('cvs/'.$cv->id )}}"><div class="view"></div></a>
                                         </div>
                                         <div class="col-4">
                                           <a href="{{ url('cvs/'.$cv->id.'/edit' )}}" ><div class="update"></div></a>
                                         </div>
                                         <div class="col-4">
                                           <button class="sub" type="submit" ><div class="closes"></div></button>
                                         </div>
                                       </div>

                                   </form>
                                 </td>
                               </tr>
                               @endforeach
                               </body>
                               </div>
                             </table>
                             {{ $cvs->links() }}


                         </div>
                       </div>
                     </div>
                   </div>


                       <div v-if="notification">
                       <div class="row" style="width:81%; margin-left:18.6%;margin-bottom:-2%;">
                       <div class="card" style="width:94.5%;height:400px;">
                       <div class="x">
                         Les Notifications
                       </div>
                       <table class="table">
                         <head>
                           <tr>
                             <th>#</th>
                             <th>Utilisateur</th>
                             <th>Message</th>
                             <th>Date</th>
                             <th>Action</th>
                           </tr>
                         </head>
                         <body>
                           @foreach($notifications as $notification)
                           <tr>

                               <div class="">
                                 <td style="width:10%;"><a href="#" style="color:#67757c;"> <img src="{{$notification->data['avatar']}}" style="width:32px;height32px;border-radius:50%;top:10px;left:10px;"></a></td>
                                 <td style="width:20%;"><a href="#" style="color:#67757c;">{{ $notification->data['nom'] }}</a> </td>
                                 <td style="width:30%;"><a href="#" style="color:#67757c;">{{ $notification->data['message'] }}</a> </td>
                                 <td style="width:20%;"><a href="#" style="color:#67757c;">{{ $notification->created_at}}</a> </td>
                                 <td style="width:10%;">
                                   <form action="{{url('cvs/'.$cv->id)}}" method="post">
                                       {{ csrf_field() }}
                                       {{ method_field('DELETE')}}

                                           <button class="sub" type="submit" ><div class="closes"></div></button>
                                   </form>
                                 </td>
                               </div>

                           </tr>
                           @endforeach

                         </body>
                       </table>
                       {{ $notifications->links() }}

                       </div>
                       </div>

                       </div>
                       <div v-if="lesemplois">
                       <div class="row" style="width:81%; margin-left:18.6%;margin-bottom:-2%;">

                       <div class="col-12">
                       <div class="card" style="width:94%;height:400px;">
                         <div class="x">
                           Les Offres D'emplois
                         </div>
                         <table class="table ">
                           <head>
                             <tr>
                               <th>Titre</th>
                               <th>Categorie</th>
                               <th>Ville</th>
                               <th>Salaire</th>
                               <th>Action</th>
                             </tr>
                           </head>
                           <body>
                             @foreach($emplois as $emploi)
                             <tr>
                               <td style="width:20%;">{{ $emploi->titre }}</td>
                               <td style="width:20%;">{{ $emploi->contrat }}</td>
                               <td style="width:20%;">{{ $emploi->ville }}</td>
                               <td style="width:20%;">{{ $emploi->salaire }}$/mois</td>

                               <td style="width:10%;">
                                 <form action="{{url('emplois/'.$emploi->id)}}" method="post">
                                   {{ csrf_field() }}
                                   {{ method_field('DELETE')}}
                                   <div class="row">
                                     <div class="col-4">
                                       <a href="{{ url('emplois/'.$emploi->id )}}"><div class="view"></div></a>
                                     </div>
                                     <div class="col-4">
                                       <a href="{{ url('emplois/'.$emploi->id.'/edit' )}}" ><div class="update"></div></a>
                                     </div>
                                     <div class="col-4">

                                       <button class="sub" type="submit" ><div class="closes"></div></button>

                                     </div>
                                   </div>
                                 </form>
                               </td>
                             </tr>
                             @endforeach
                           </body>
                         </table>
                         {{ $emplois->links() }}
                       </div>
                       </div>
                       </div>
                       </div>
                       <div v-if="lestests">
                         <div class="row" style="width:81%; margin-left:19%;margin-bottom:-2%;">
                             <div class="card" style="width:94.2%;height:400px;">
                               <div class="x">
                                 Les Tests
                               </div>
                               <table class="table">
                                 <head>
                                   <tr>
                                     <th>Titre</th>
                                     <th>Categorie</th>
                                     <th>Note</th>
                                     <th>Date</th>
                                     <th>Action</th>
                                   </tr>
                                 </head>
                                 <body>
                                   @foreach($tests as $test)
                                   <tr>
                                     <td style="width:20%;">{{ $test->titre }}</td>
                                     <td style="width:20%;">{{ $test->categorie }}</td>
                                     <td style="width:20%;">{{ $test->note }}/20</td>
                                     <td style="width:20%;">{{ $test->created_at}}</td>
                                     <td style="width:10%;">
                                       <form action="{{url('tests/'.$test->id)}}" method="post">
                                           {{ csrf_field() }}
                                           {{ method_field('DELETE')}}
                                           <div class="row">
                                             <div class="col-4">
                                               <a href="{{ url('tests/'.$test->id )}}"><div class="view"></div></a>
                                             </div>
                                             <div class="col-4">
                                               <a href="{{ url('tests/'.$test->id.'/edit' )}}" ><div class="update"></div></a>
                                             </div>
                                             <div class="col-4">
                                               <button class="sub" type="submit" ><div class="closes"></div></button>
                                             </div>
                                           </div>

                                       </form>
                                     </td>
                                   </tr>
                                   @endforeach

                                 </body>
                               </table>
                               {{ $tests->links() }}
                             </div>
                         </div>
                       </div>
    @endif
</div>

@include('user.user')
@include('notification.show')


@endsection


@section('javascripts')

<script >
var userid   = <?php echo json_encode($user->id); ?>;
var cvid     = <?php echo json_encode($user->id); ?>;


    var app = new Vue ({
      el: '#app',
      data:{
            home:true,
            lescvs:false,
            lescvss:false,
            lesemplois:false,
            notification:false,
            lesusers:false,
            lestests:false,
            cadre:false,
            cvs: [],
            cv: {
              id:cvid
            },
            emplois: [],
            emploi: {
              id:1
            },
            tests: [],
            test: {
              id:cvid
            },
            userss: [],
            users: {
              id:userid
            }
      },
      methods:{
        deletecv: function (cv){
          axios.delete('/cvs/deletecv/'+cv.id)
          .then(response => {

                      var position = this.cvs.indexOf(cv);
                      this.cvs.splice(position,1);

          })
      },
      deletetest: function (test){
        axios.delete('/tests/deletetest/'+test.id)
        .then(response => {

                    var position = this.tests.indexOf(test);
                    this.tests.splice(position,1);

        })
    }
    }
    });
</script>


@endsection
