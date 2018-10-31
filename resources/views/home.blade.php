@extends('layouts.app')

@section('content')
<div class="carde">
<div  id="filtre" >
        <div class="container">
          <div class="row">

            <div class="col-1"></div>
            <div class="col-10" style="margin-left:4%;">

              <div class="head">

                <span>
                  <p class="titre">VOTRE CARRIÈRE COMMENCE ICI</p>
                </span>

                <span>
                  <p class="titre1">RECHERCHE DES STAGES ET DES OFFRES D'EMPLOIS</p>
                </span>

                <div class="recherche">
                  <form class="form-row" action="/rechercher" method="get">
                    <div class="form-group col-md-4">
                        <select class="form-control" name="categorie" >
                          <?php     $categorie=DB::table('emplois')->select('contrat')->distinct()->get(); ?>
                          <?php     $ville=DB::table('emplois')->select('ville')->distinct()->get(); ?>

                          <option >Categorie</option>
                            @foreach($categorie as $cat)
                              <option >{{$cat->contrat}}</option>
                            @endforeach


                        </select>
                    </div>

                    <div class="form-group col-md-4">
                      <select class="form-control" name="ville">
                        <option>Ville</option>
                          @foreach($ville as $v)
                            <option value="" >{{$v->ville}}</option>
                          @endforeach



                      </select>
                    </div>

                    <div class="form-group col-md-3">

                      <button type="submit"  class="btn  col-md-12" style="background:#85CE36;color:#fff;">rechercher</button>

                    </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


        <div class="container">
          <div class="espace"><div class="col-sm"></div></div>
          <p class="cat">Les catégories </p>
          <div class="espace"><div class="col-sm"></div></div>

          <div class="galerie" style="padding:1% 1.5%; 1.5% 1.5%">
            <div class="row">

              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;" >
                  <div class="img1">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Commerce</div>
                  </div>
                </a>
              </div>


              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;" >
                  <div class="img2">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Education</div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;"  >
                  <div class="img3">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Construction</div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;"  >
                  <div class="img4">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Contabilité</div>
                  </div>
                </a>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                <a href="#" target="_blank"  style="text-decoration: none;" >
                  <div class="img5">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">santé</div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;"  >
                  <div class="img6">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Automobile</div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <a href="#" target="_blank" style="text-decoration: none;"  >
                  <div class="img7">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Restaurant</div>
                  </div>
                </a>
              </div>
              <div class="col-3">
                <a href="#" target="_blank"  style="text-decoration: none;" >
                  <div class="img8">
                    <div class="aze"> </div>
                    <div class="beska" id="aze">Télécommunication</div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="espace"><div class="col-sm"></div></div>
        <div class="espace"><div class="col-sm"></div></div>

      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>


      <div class="espace"><div class="col-sm"></div></div>
      <div class="espace"><div class="col-sm"></div></div>

      <div class="about" id="A_propos">
        <div class="container">
          <div class="row">
            <div class="col-8">
              <div class="espace" id="lm"><div class="col-sm"></div></div>
              <div class="ax">
              <span class="ab">À propos de </span>  <span class="abw">JobStore</span>
                <p class="abo">JobStore est un site parfait qui offre à nos utilisateurs l'opportunité de trouver leurs carrières professionnelles, de réaliser de  nouveaux projets pour les indépendants ou simplement de grandes chances d'emploi. JobStore est chargé avec des options, à la fois pour le recruteur et pour les candidats. Les recruteurs et les entreprises peuvent publier, éditer et gérer les offres d'emploi et les profils d'entreprise . Les candidats peuvent faire la même chose en postulant
leurs CV.</p>
                </div>
              </div>
              <div class="col-4">
                <div class="espace" id="ml"><div class="col-sm"></div></div>
                <div class="aa">
                  <p>- Rechercher des emplois</p>
                  <p>- Créer des Cvs</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="end">
          <div class="espace"><div class="col-sm"></div></div>
          <p class="en">© 2018 Beska - Designed & Developed by</p>
          <p class="en" style="color:#85CE36">Mohemed Elhedi Ben Khlifa</p>
        </div>

@endsection
