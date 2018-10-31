<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Scripts-->

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Open+Sans|Poppins|Song+Myung|Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/acceuil.css') }}" rel="stylesheet">
    <link href="{{ asset('css/experience.css') }}" rel="stylesheet">

</head>
<body>
    <div >

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="z-index:21;position:fixed;width:100%;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}" style="color:#455a64;font-size:24px;">

                  {{'JobStore' }}

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">beska</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mc-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Home</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#A_propos">A propos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('profiles') }}">Profile</a>
                      </li>
                    </ul>




                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a></li>
                        @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="margin-left:30px;text-decoration:none;color: rgba(0, 0, 0, 0.5);">
                                <img src="/not.png" style="width:52px;height:52px;position:absolute; top:-15px;left:-30px;border-radius:50%;margin-left:-30%;">
                            </a>

                            <ul class="dropdown-menu" role="menu" style="margin-top:10px;margin-left:-600%;width:520px;">
                              <li>
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                <div style="margin:2%;">
                                  <a href="{{url('/read')}}" data-toggle="modal" data-target="#notification" style="text-decoration:none;color: rgba(0, 0, 0, 0.5);">
                                    <img src="{{$notification->data['avatar']}}" style="width32px;height:32px;top:5px;left:10px;border-radius:50%;padding:2%;">
                                    {{$notification->data['nom']}}
                                    {{$notification->data['message']}}
                                  </a>
                                </div>
                                @endforeach
                              </li>
                            </ul>
                        </li>



                     <li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-left:10px;text-decoration:none;color: rgba(0, 0, 0, 0.5);">
                             <img src="/{{ Auth::user()->avatar }}" style="width32px;height:32px;position:absolute; top:-5px;left:-30px;border-radius:50%;">
                             {{ Auth::user()->name }} </span>
                         </a>

                         <ul class="dropdown-menu" role="menu" style="margin-top:10px;margin-left:-10%;">
                           <li>
                             <a style="margin-left:30px;text-decoration:none;color: rgba(0, 0, 0, 0.5);" href="{{ route('profiles',auth()->user()) }}">
                               <span><i class="fas fa-user"></i></span><span>Profile</span>
                             </a>
                           </li>

                             <li>
                                 <a style="margin-left:30px;text-decoration:none;color: rgba(0, 0, 0, 0.5);" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                     Deconnexion
                                 </a>
                              </li>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                       style="display: none;">
                                     {{ csrf_field() }}
                                 </form>
                         </ul>
                     </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">
            @yield('content')
        </main>

</div>
<script src="/js/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
@yield('javascripts')

<script type="text/javascript">
$('#notification').on('show.bs.modal', function (event) {

  var button = $(event.relatedTarget)
  var titre = button.data('mytitre')
  var contrat = button.data('contrat')
  var salaire = button.data('salaire')
  var ville = button.data('ville')
  var poste = button.data('poste')
  var entreprise = button.data('entreprise')
  var profile = button.data('profile')


  var modal = $(this)

  modal.find('.modal-body #titre').val(titre)
  modal.find('.modal-body #contrat').val(contrat)
  modal.find('.modal-body #salaire').val(salaire)
  modal.find('.modal-body #ville').val(ville)
  modal.find('.modal-body #profile').val(profile)
  modal.find('.modal-body #poste').val(poste)
  modal.find('.modal-body #entreprise').val(entreprise)
})
</script>

</body>
</html>
