@extends('layouts.app')


@section('content')
    <link href="{{ asset('css/emploi.css') }}" rel="stylesheet">

  <div class="container" style="margin-top:6%;">
    <div class="page">
      <div class="image">
        <div class="filtre" id="fil">
          <div class="row">

            <div class="col-6" id="linn"  style="  margin-top: 1%;">
              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title" style="margin-top:3%;">Titre :</label>
                </span>
                <span>
                   <label class="donné">Collaborateur comptable junior h/f</label>
                </span>
              </div>

              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title">Ville :</label>
                </span>
                <span>
                   <label class="donné">Paris, 62 rue Condorcet</label>
                </span>
              </div>
            </div>

            <div class="col-6" style="  margin-top: -2%;">
              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title" style="margin-top:10%;">Contrat    :</label>
                </span>
                <span>
                   <label class="donné"> Apprentissage/Alternance</label>
                </span>
              </div>
              <div class="" style="  margin-left: 5%;">
                <span>
                   <label class="title">Salaire :</label>
                </span>
                <span>
                   <label class="donné">3500$ par mois</label>
                </span>
              </div>
            </div>

          </div>


              <div class="" style="  margin-left: 1%;margin-top:2%;">
                <span>
                   <label class="title" >Le profile rechercher :</label>
                </span>
                <span>
                   <label class="donné">Bac validé dans le domaine de l'assistanat, ou bac général, La connaissance du secteur bancaire est un plus.N'hésitez pas à envoyer votre CV+LM à cbermond[a]pigier.com !</label>
                </span>
              </div>
              <div class="" style="  margin-left: 1%;">
                <span>
                   <label class="title">L'entreprise :</label>
                </span>
                <span>
                   <label class="donné">Pigier Performance c'est la force d'un réseau de 24 écoles en France au service de la formation des jeunes et des entreprises. Nous proposons des formations de Bac à Bac +5 validées par des diplômes d'Etat et des titres certifiés pour réaliser vos ambitions personnelles et professionnelles.s</label>
                </span>
              </div>
              <div class="" style="  margin-left: 1%;">
                <span>
                   <label class="title">Le poste :</label>
                </span>
                <span>
                   <label class="donné">Gestion des dossiers : Participation à la frappe des lettres de missions, Vérification des devis envoyés, Frappe, mise en page, vérifications des coordonnées des courriers, Remise en forme, relecture, correction y compris orthographique et syntaxique, envoi des rapports, Validation des honoraires, participation à la facturation</label>
                </span>
              </div>

              <div style="text-align:right">

                  <a href="{{url('emplois/'.$emploi->id.'/cvs/index')}}" class="btn btn-success pull-right col-3 " style="margin-right:40px;">Inscription</a>

              </div>

        </div>
    </div>
    </div>
  </div>
@endsection
