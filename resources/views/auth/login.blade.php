@extends('layouts.app')

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" >

<div class="carde"style="margin-top:3.2%;">
<div  id="filtre">
  <div class="container">
          <div class="row">
            <div class="col-4"></div>

            <div class="col-4">
              <div class="card" id="a">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="container"><div class="container">
                          <p class="beskaa">JobStore</p>
                          <p class="sd">Connectez-vous pour trouver    des stages et des opportunités d'emploi</p>

                          <div class="bar"></div>
                          <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }} " placeholder="Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} " name="password" placeholder="Mot de passe" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group">
                              <div class="col-md-12 ">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Enregistrer mot de passe') }}
                                      </label>
                                  </div>
                              </div>
                          </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn col-md-12" style="background:#455a64;color:#fff;" >
                                    {{ __('Connexion') }}
                                </button>

                                <div class="espace"><div class="col-sm"></div></div>

                                <a class="passe" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublier?') }}
                                </a>
                            </div>
                          </div></div>
                    </form>
                  </div>

                    <div class="card" id="b">
                      <div class="container">
                          <div class="espace"></div>
                          <div class="row">

                            <div class="col-7">
                              Vous n’avez pas de compte  ?
                            </div>

                            <div class="col-5">
                              <a href="{{ route('register') }}">Inscrivez-vous</a>
                            </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-4"></div>


          </div>
        </div>
      </div>
    </div>

                    @endsection
