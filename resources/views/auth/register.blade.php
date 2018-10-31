@extends('layouts.app')

@section('content')

<link href="{{ asset('css/register.css') }}" rel="stylesheet">

<div class="carde"  style="margin-top:3.2%;">
<div id="filtre">
  <div class="container">
          <div class="row">
            <div class="col-4"></div>

            <div class="col-4">
              <div class="card" id="a">

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <div class="container"><div class="container">

                          <p class="beskaa">JobStore</p>
                          <p class="sd">Inscrivez-vous pour trouver des stages et des offres d'emploi</p>

                          <div class="bar"></div>
                          <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="Nom" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="E-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="password" type="password"  placeholder="Mot de passe" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  value="{{ old('password') }}" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="espace"><div class="col-sm"></div></div>



                                <div class="col-md-12">
                                    <input id="date_de_naissance" type="date" placeholder="Date de naissance" class="form-control{{ $errors->has('date_de_naissance') ? ' is-invalid' : '' }}" name="date_de_naissance" value="{{ old('date_de_naissance') }}" required>

                                    @if ($errors->has('date_de_naissance'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('date_de_naissance') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <input id="telephone" type="number" placeholder="Telephone" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required>

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="espace"><div class="col-sm"></div></div>

                            <div class="col-md-12">
                                <button type="submit" class="btn col-md-12" style="background:#455a64;color:#fff;">
                                    {{ __('Inscrivez') }}
                                </button>
                            </div>

                            <div class="espace"><div class="col-sm"></div></div>

                        </div></div>
                    </form>
                </div>

                <div class="card" id="b">

                  <div class="container"><div class="container">
                    <div class="espace"></div><div class="espace"></div>

                    <div class="row">
                      <div class="col-7">
                        Vous n’avez pas de compte ?
                      </div>
                      <div class="col-5">
                        <a href="{{ route('login') }}">Connexion</a>
                      </div>
                    </div>

                </div></div>

            </div>

            <div class="col-4"></div>

            </div>
        </div>
    </div>
  </div>
</div>
@endsection
