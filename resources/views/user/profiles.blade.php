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
</div>


<div v-if="lescvs">
<div class="row" style="width:81%; margin-left:18.6%;margin-bottom:-2%;">
<div class="col-9">
  <div class="card" style="width:94.5%;height:400px;">
    <div class="x">
      Les Cvs
    </div>
    <table class="table">
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
<div class="col-3" style="margin-left:-2.9%;">
<a href="{{route('cvs.create')}}" style="text-decoration:none;">
  <div class="card" style="width:93%;height:400px;background:#CCCCCC;">
      <div class="ajouter_cv"></div>
        <h4 style="font-size:28px;color:#fff;text-align:center;font-family:'Rancho';margin-top:10%;font-weight:700">Ajouter Un Cv</h4>
  </div>
</a>
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
    </tr>
  </head>
  <body>
    @foreach($notifications as $notification)
    <tr>
      <td style="width:10%;"><img src="{{$notification->data['avatar']}}" style="width:32px;height32px;border-radius:50%;top:10px;left:10px;"></td>
      <td style="width:20%;">{{ $notification->data['nom'] }}</td>
      <td style="width:50%;">{{ $notification->data['message'] }}</td>
      <td style="width:40%;">{{ $notification->created_at}}</td>
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
<div class="col-3">
<a href="{{route('emplois.create')}}" style="text-decoration:none;">
  <div class="card" style="width:93%;height:400px;background:#D6C9C9;">
    <div class="ajouter_emploi"></div>
    <h4 style="font-size:28px;color:#fff;text-align:center;font-family: 'Rancho';margin-top:4%;font-weight:700;">Ajouter Offre D'emploi</h4>
  </div>
</a>
</div>
<div class="col-9">
<div class="card" style="width:94%;height:400px;">
  <div class="x">
    Les Offres D'emplois
  </div>
  <table class="table ">
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
</div>
</div>
