@if (Auth::user()->is_admin == 1)
<div class="row" id="#profiles"  >
    <div class="col-md-2" >
      <div class="cadre" style="background:#8B9598;">
        <div class="top"></div>
        <div class="cercle"></div>
        <div class="nom">Mohamed Admin </div>
        <div class="fonction">Administrateur </div>

      </div>

      <div class="cadre3" style="background:#8B9598;">
        <div class="nav flex-column nav-pills mt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=true" id="v-notifications-tab" data-toggle="pill" href="#v-pills-notifications" role="tab" aria-controls="v-pills-notifications" aria-selected="false"><div class="row"><div class="col-4"><div class="notification"></div></div><div class="col-8">Notifications</div></div></a>
          <div class="linne"></div>
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=true,home=false,notification=false" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false"><div class="row"><div class="col-4"><div class="users"></div></div><div class="col-8">Users</div></div></a>
          <div class="linne"></div>
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link "            @click="lescvs=true,lesemplois=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-cvs-tab" data-toggle="pill" href="#v-pills-cvs" role="tab" aria-controls="v-pills-cvs" aria-selected="true"><div class="row"><div class="col-4"><div class="cvs"></div></div><div class="col-8">Cvs</div></div></a>
          <div class="linne"></div>
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link"             @click="lesemplois=true,lescvs=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-emplois-tab" data-toggle="pill" href="#v-pills-emplois" role="tab" aria-controls="v-pills-emplois" aria-selected="false"><div class="row"><div class="col-4"><div class="emploi"></div></div><div class="col-8">Emplois</div></div></a>
          <div class="linne"></div>
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link"             @click="lesemplois=false,lescvs=false,cadre=false,lestests=true,lesusers=false,home=false,notification=false" id="v-tests-tab" data-toggle="pill" href="#v-pills-tests" role="tab" aria-controls="v-pills-tests" aria-selected="false"><div class="row"><div class="col-4"><div class="tests"></div></div><div class="col-8">Tests</div></div></a>
          <div class="linne"></div>
          <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link active"      @click="lesemplois=false,lescvs=false,cadre=false,lestests=false,lesusers=false,home=true,notification=false" id="v-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><div class="row"><div class="col-4"><div class="setting"></div></div><div class="col-8">Paramètres</div></div></a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-cvs" role="tabpanel" aria-labelledby="v-pills-cvs-tab"></div>
          <div class="tab-pane fade" id="v-pills-emplois" role="tabpanel" aria-labelledby="v-pills-emplois-tab"></div>
          <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-messages-tab"></div>
          <div class="tab-pane fade" id="v-pills-tests" role="tabpanel" aria-labelledby="v-pills-tests-tab"></div>
          <div class="tab-pane fade" id="v-pills-notifications" role="tabpanel" aria-labelledby="v-pills-notifications-tab"></div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"></div>
        </div>
      </div>

      <div class="cadre1" style="background:#8B9598;">
        <div class="nombre" style="text-align:center;margin-bottom:-10px; ">
          <span class="nb" style="margin-left:10%;">{{count($emplois)}}</span>
          <span class="nb" style="margin-left:16%;">{{count($notifications)}}</span>
          <span class="nb" style="margin-left:14%;">{{count($users)}}</span>
        </div>
        <div class="nombre" style="text-align:center;">
          <span class="sous_titre" style="margin-right:2%;margin-left:2%;">Emplois</span>
          <span class="sous_titre" style="margin-right:2%;margin-left:2%;">Notifications</span>
          <span class="sous_titre" style="margin-right:2%;margin-left:2%;">Users</span>
        </div>
      </div>

    </div>

    <div class="col-10">

      <div>
      <div class=""  v-if="lescvs">
        <div class="row">
          <div class="col-12">
            <div class="cadre8">
              <div class="col-8">
                <div class="cv " style="font-size:52px;">Les Cvs</div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-9">
          <div class="cadre10">
            <div class="row">


            </div>
            <table class="table table-striped">
              <div class="container">
              <head>
                <tr>
                  <th>Nom</th>
                  <th>E-Mail</th>
                  <th>Action</th>
                </tr>
              </head>
              <body>
                @foreach($cvs as $cv)
                <tr>
                  <td style="width:40%;">{{ $cv->nom }}</td>
                  <td style="width:40%;">{{ $cv->email}}</td>
                  <td>
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
                            <a href="#"><div class="closes"></div></a>
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
        <div class="col-3">
          <div class="cadre9" style="padding:12%; text-align:center;">
            <div class="create_cv"> </div>
            <a href="{{route('cvs.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Cv</a>
          </div>
          <div class="cadre11">
            <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
              <div class="cvss" ></div>
              <span class="nbr">{{count($cvs)}}</span>
              <span class="sous_titre1">Cvs</span>

            </div>

          </div>
        </div>

      </div>
    </div>

        <div class=""  v-if="lesemplois">
          <div class="row">
            <div class="col-12">
              <div class="cadre8">
                <div class="col-8">
                  <div class="cv " style="font-size:52px;">Les Emplois</div>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-9">
            <div class="cadre10">
              <div class="row">


              </div>
              <table class="table table-striped">
                <head>
                  <tr>
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>Action</th>
                  </tr>
                </head>
                <body>
                  @foreach($emplois as $emploi)
                  <tr>
                    <td style="width:40%;">{{ $emploi->titre }}</td>
                    <td style="width:40%;">{{ $emploi->categorie }}</td>

                    <td>
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
                            <a href="#"><div class="closes"></div></a>
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
          <div class="col-3">
            <div class="cadre9" style="padding:12%; text-align:center;">
              <div class="create_emploi"> </div>
              <a href="{{route('emplois.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Emploi</a>
            </div>
            <div class="cadre11">
              <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
                <div class="emplois" ></div>
                <span class="nbr">{{count($emplois)}}</span>
                <span class="sous_titre1">Emplois</span>

              </div>

            </div>
          </div>

        </div>
      </div>

      <div class=""  v-if="lestests">
        <div class="row">
          <div class="col-12">
            <div class="cadre8">
              <div class="col-8">
                <div class="cv " style="font-size:52px;">Les Tests</div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-9">
          <div class="cadre10">
            <div class="row">


            </div>
            <table class="table table-striped">
              <head>
                <tr>
                  <th>Titre</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </head>
              <body>
                @foreach($tests as $test)
                <tr>
                  <td style="width:40%;">{{ $test->titre }}</td>
                  <td style="width:40%;">{{ $test->created_at}}</td>
                  <td>
                    <form action="{{url('tests/'.$test->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <div class="row">
                          <div class="col-4">
                            <a href="{{ url('tests/'.$test->id.'/show_test' )}}"><div class="view"></div></a>
                          </div>
                          <div class="col-4">
                            <a href="{{ url('tests/'.$test->id.'/edit' )}}" ><div class="update"></div></a>
                          </div>
                          <div class="col-4">
                            <a href="#"><div class="closes"></div></a>
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
        <div class="col-3">
          <div class="cadre9" style="padding:12%; text-align:center;">
            <div class="create_test"> </div>
            <a href="{{route('tests.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Test</a>
          </div>
          <div class="cadre11">
            <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
              <div class="testss" ></div>
              <span class="nbr">{{count($tests)}}</span>
              <span class="sous_titre1">Tests</span>

            </div>

          </div>
        </div>

      </div>
    </div>
    @include('notification.show')
    <div class=""  v-if="notification">
      <div class="row">
        <div class="col-12">
          <div class="cadre8">
            <div class="col-8">
              <div class="cv " style="font-size:52px;">Les Notifications</div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-9">
        <div class="cadre10">
          <div class="row">


          </div>
          <table class="table table-striped">
            <head>
              <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </head>
            <body>
              @foreach($notifications as $notification)
              <tr>
                <td style="width:40%;">{{ $notification->titre }}</td>
                <td style="width:40%;">{{ $notification->created_at}}</td>
                <td>
                  <form action="{{url('notifications/'.$notification->id)}}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <div class="row">
                        <div class="col-4">
                        <a href="#"><div class="view" data-toggle="modal" data-target="#exampleModal"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="{{ url('notifications/'.$notification->id.'/edit' )}}" ><div class="update"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="#"><div class="closes"></div></a>
                        </div>
                      </div>
                  </form>
                </td>
              </tr>
              @endforeach

            </body>
          </table>
          {{ $notifications->links() }}

        </div>
      </div>
      <div class="col-3">
        <div class="cadre9" style="padding:12%; text-align:center;">
          <div class="create_notification"> </div>
          <a href="{{route('tests.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Notification</a>
        </div>
        <div class="cadre11">
          <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
            <div class="notifications" ></div>
            <span class="nbr">{{count(auth()->user()->unreadNotifications)}}</span>
            <span class="sous_titre1">Notifications</span>

          </div>

        </div>
      </div>

    </div>
  </div>

  @include('user.user')

    <div class=""  v-if="lesusers">
      <div class="row">
        <div class="col-12">
          <div class="cadre8">
            <div class="col-8">
              <div class="cv " style="font-size:52px;">Les Utilisateurs</div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-9">
        <div class="cadre10">
          <div class="row">


          </div>
          <table  class="table table-striped">
            <head>
              <tr>
                <th> Nom</th>
                <th>E-Mail</th>
                <th>Action</th>
              </tr>
            </head>
            <body>
              @foreach($users as $user)
              <tr>
                <td style="width:40%;"><img src="{{$user->avatar}}" style="width:32px;height32px;border-radius:50%;top:10px;left:10px;">{{ $user->name }}</td>
                <td style="width:40%;">{{ $user->email}}</td>

                <td>

                  <form action="{{url('users/'.$user->id)}}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}

                      <div class="row">
                        <div class="col-4">
                          <a href="#"><div class="view" data-toggle="modal" data-target="#user"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="{{ url('users/'.$user->id.'/edit' )}}" ><div class="update"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="#"><div class="closes"></div></a>
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
      <div class="col-3">
        <div class="cadre9" style="padding:12%; text-align:center;">
          <div class="create_user"> </div>
          <a href="#"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Utilisateur</a>
        </div>
        <div class="cadre11">
          <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
            <div class="userss" ></div>
            <span class="nbr">{{count($users)}}</span>
            <span class="sous_titre1">Utilisateurs</span>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>
  <div class="" v-if="home">

        <div class="row">
          <div class="col-12">
            <div class="cadre8">
              <div class="col-8">
                <div class="cv " style="font-size:52px;">Les Cvs</div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-9">
          <div class="cadre10">
            <div class="row">


            </div>
            <table class="table table-striped">
              <div class="container">
              <head>
                <tr>
                  <th>Nom</th>
                  <th>E-Mail</th>
                  <th>Action</th>
                </tr>
              </head>
              <body>
                @foreach($cvs as $cv)
                <tr>
                  <td style="width:40%;">{{ $cv->nom }}</td>
                  <td style="width:40%;">{{ $cv->email}}</td>
                  <td>
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
                            <a href="#"><div class="closes"></div></a>
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
        <div class="col-3">
          <div class="cadre9" style="padding:12%; text-align:center;">
            <div class="create_cv"> </div>
            <a href="{{route('cvs.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Cv</a>
          </div>
          <div class="cadre11">
            <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
              <div class="cvss" ></div>
              <span class="nbr">{{count($cvs)}}</span>
              <span class="sous_titre1">Cvs</span>

            </div>

          </div>
        </div>

      </div>

          <div class="row">
            <div class="col-12">
              <div class="cadre8">
                <div class="col-8">
                  <div class="cv " style="font-size:52px;">Les Emplois</div>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-9">
            <div class="cadre10">
              <div class="row">


              </div>
              <table class="table table-striped">
                <head>
                  <tr>
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>Action</th>
                  </tr>
                </head>
                <body>
                  @foreach($emplois as $emploi)
                  <tr>
                    <td style="width:33%;">{{ $emploi->titre }}</td>
                    <td style="width:33%;">{{ $emploi->categorie }}</td>
                    <td>
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
                            <a href="#"><div class="closes"></div></a>
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
          <div class="col-3">
            <div class="cadre9" style="padding:12%; text-align:center;">
              <div class="create_emploi"> </div>
              <a href="{{route('emplois.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Emploi</a>
            </div>
            <div class="cadre11">
              <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
                <div class="emplois" ></div>
                <span class="nbr">{{count($emplois)}}</span>
                <span class="sous_titre1">Emplois</span>

              </div>

            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-12">
            <div class="cadre8">
              <div class="col-8">
                <div class="cv " style="font-size:52px;">Les Tests</div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
        <div class="col-9">
          <div class="cadre10">
            <div class="row">


            </div>
            <table class="table table-striped">
              <head>
                <tr>
                  <th>Titre</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </head>
              <body>
                @foreach($tests as $test)
                <tr>
                  <td style="width:40%;">{{ $test->titre }}</td>
                  <td style="width:40%;">{{ $test->created_at}}</td>
                  <td>
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
                            <a href="#"><div class="closes"></div></a>
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
        <div class="col-3">
          <div class="cadre9" style="padding:12%; text-align:center;">
            <div class="create_test"> </div>
            <a href="{{route('tests.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Test</a>
          </div>
          <div class="cadre11">
            <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
              <div class="testss" ></div>
              <span class="nbr">{{count($tests)}}</span>
              <span class="sous_titre1">Tests</span>

            </div>

          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-12">
          <div class="cadre8">
            <div class="col-8">
              <div class="cv " style="font-size:52px;">Les Notifications</div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-9">
        <div class="cadre10">
          <div class="row">


          </div>
          <table class="table table-striped">
            <head>
              <tr>
                <th>Titre</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </head>
            <body>
              @foreach($tests as $test)
              <tr>
                <td style="width:40%;">{{ $test->titre }}</td>

                <td style="width:40%;">{{ $test->created_at}}</td>
                <td>
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
                          <a href="#"><div class="closes"></div></a>
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
      <div class="col-3">
        <div class="cadre9" style="padding:12%; text-align:center;">
          <div class="create_notification"> </div>
          <a href="{{route('tests.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Notification</a>
        </div>
        <div class="cadre11">
          <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
            <div class="notifications" ></div>
            <span class="nbr">12</span>
            <span class="sous_titre1">Notifications</span>

          </div>

        </div>
      </div>

    </div>

      <div class="row">
        <div class="col-12">
          <div class="cadre8">
            <div class="col-8">
              <div class="cv " style="font-size:52px;">Les Utilisateurs</div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-9">
        <div class="cadre10">
          <div class="row">


          </div>
          <table class="table table-striped">
            <head>
              <tr>
                <th> Nom</th>
                <th>E-Mail</th>
                <th>Action</th>
              </tr>
            </head>
            <body>
              @foreach($users as $user)
              <tr>
                <td style="width:40%;">{{ $user->name }}</td>

                <td style="width:40%;">{{ $user->email}}</td>

                <td>

                  <form action="{{url('users/'.$user->id)}}" method="post">

                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <div class="row">
                        <div class="col-4">
                          <a href="{{ url('users/'.$user->id )}}"><div class="view"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="{{ url('users/'.$user->id.'/edit' )}}" ><div class="update"></div></a>
                        </div>
                        <div class="col-4">
                          <a href="#"><div class="closes"></div></a>
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
      <div class="col-3">
        <div class="cadre9" style="padding:12%; text-align:center;">
          <div class="create_user"> </div>
          <a href="{{route('tests.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Utilisateur</a>
        </div>
        <div class="cadre11">
          <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
            <div class="userss" ></div>
            <span class="nbr">254</span>
            <span class="sous_titre1">Utilisateurs</span>

          </div>

        </div>
      </div>

    </div>


  </div>

</div>

@endif

@if (Auth::user()->is_admin == 0)
<div class="row"  >
<div class="col-md-2" >
  <div class="cadre22" style="background:#8B9598;">
    <div class="top"></div>
    <div class="cercle"></div>
    <div class="nom">Ben Khlifa Mohamed </div>
    <div class="fonction">Developpeur </div>
    <div class="liinne"></div>
    <div class="icon" style="margin-top:6%;">
      <p class="donne"> +21625300612</p>
    </div>
    <div class="icon1" >
      <p class="donne"> Mohamed@gmail.com</p>
    </div>
    <div class="icon2" >
      <p class="donne">4070,M'saken,sousse</p>
    </div>

  </div>

  <div class="cadre33" style="background:#8B9598;">
    <div class="nav flex-column nav-pills mt-1" id="v-pills-tab" role="tablist" aria-orientation="vertical" >
      <div class="linne"></div>

      <div class="linne"></div>
      <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link active "            @click="lescvss=true,lesemplois=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-cvs-tab" data-toggle="pill" href="#v-pills-cvs" role="tab" aria-controls="v-pills-cvs" aria-selected="true"><div class="row"><div class="col-4"><div class="cvs"></div></div><div class="col-8">Cvs</div></div></a>
      <div class="linne"></div>
      <a  style="color:#ffffff;font-family:'Rancho';" class="nav-link"             @click="lesemplois=true,lescvss=false,cadre=false,lestests=false,lesusers=false,home=false,notification=false" id="v-pills-emplois-tab" data-toggle="pill" href="#v-pills-emplois" role="tab" aria-controls="v-pills-emplois" aria-selected="false"><div class="row"><div class="col-4"><div class="emploi"></div></div><div class="col-8">Emplois</div></div></a>
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-cvs" role="tabpanel" aria-labelledby="v-pills-cvs-tab"></div>
      <div class="tab-pane fade" id="v-pills-emplois" role="tabpanel" aria-labelledby="v-pills-emplois-tab"></div>
    </div>
  </div>

  <div class="cadre1" style="background:#8B9598;">
    <div class="nombre" style="text-align:center;margin-bottom:-10px; ">
      <span class="nb">54</span>
      <span class="nb">98</span>
    </div>
    <div class="nombre" style="text-align:center;">
      <span class="sous_titre" style="margin-right:0%;margin-left:5%;">Emplois</span>
      <span class="sous_titre" style="margin-right:10%;margin-left:14%;">Cvs</span>
    </div>
  </div>

</div>
</div>
<div class="col-10">


  <div class=""  v-if="lescvss">
    <div class="row">
      <div class="col-12">
        <div class="cadre8">
          <div class="col-8">
            <div class="cv " style="font-size:52px;">Les Cvs</div>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
    <div class="col-9">
      <div class="cadre10">
        <div class="row">


        </div>
        <table class="table table-striped">
          <div class="container">
          <head>
            <tr>
              <th>Nom</th>
              <th>E-Mail</th>
              <th>Action</th>
            </tr>
          </head>
          <body>
            @foreach($cvs as $cv)
            <tr>
              <td style="width:40%;">{{ $cv->nom }}</td>
              <td style="width:40%;">{{ $cv->email}}</td>
              <td>
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
                        <a href="#"><div class="closes"></div></a>
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
    <div class="col-3">
      <div class="cadre9" style="padding:12%; text-align:center;">
        <div class="create_cv"> </div>
        <a href="{{route('cvs.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Cv</a>
      </div>
      <div class="cadre11">
        <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
          <div class="cvss" ></div>
          <span class="nbr">54</span>
          <span class="sous_titre1">Cvs</span>

        </div>

      </div>
    </div>

  </div>
</div>

    <div class=""  v-if="lesemplois">
      <div class="row">
        <div class="col-12">
          <div class="cadre8">
            <div class="col-8">
              <div class="cv " style="font-size:52px;">Les Emplois</div>
            </div>
          </div>
        </div>
      </div>
    <div class="row">
      <div class="col-9">
        <div class="cadre10">
          <div class="row">


          </div>
          <table class="table table-striped">
            <head>
              <tr>
                <th>Titre</th>
                <th>Categorie</th>
                <th>Action</th>
              </tr>
            </head>
            <body>
              @foreach($emplois as $emploi)
              <tr>
                <td style="width:40%;">{{ $emploi->titre }}</td>
                <td style="width:40%;">{{ $emploi->categorie }}</td>

                <td>
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
                        <a href="#"><div class="closes"></div></a>
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
      <div class="col-3">
        <div class="cadre9" style="padding:12%; text-align:center;">
          <div class="create_emploi"> </div>
          <a href="{{route('emplois.create')}}"  class="btn col-12 pull-right" style="background:#8B9598;color:#ffffff;margin-top:12%;">Ajouter Un Emploi</a>
        </div>
        <div class="cadre11">
          <div  style="text-align:center;margin-bottom:10px;padding-top:8%; ">
            <div class="emplois" ></div>
            <span class="nbr">154</span>
            <span class="sous_titre1">Emplois</span>

          </div>

        </div>
      </div>

    </div>
  </div>


</div>
</div>

@endif
</div>


<div class="nombre" style="text-align:center;margin-bottom:-10px;margin-top:14%; ">
  <div class="row" style="margin-left:2%;">
    <div class="col-3"></div>
    <div class="col-3">
      <span class="nb">{{count($cvs)}}</span>
    </div>
    <div class="col-3">
      <span class="nb">{{count($notifications)}}</span>
    </div>
  </div>
  <div class="row" style="margin-left:2%;">
    <div class="col-3"></div>
    <div class="col-3">
      <span class="sous_titre" >Cvs</span>
    </div>
    <div class="col-3">
      <span class="sous_titre">Notifications</span>
    </div>
  </div>
</div>
