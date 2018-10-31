

<!-- Modal -->
<div class="modal"  id="notification" tabindex="-1" role="dialog" aria-labelledby="notification" aria-hidden="true">
  <div class="modal-dialog" role="document" style="min-width: 60%;">
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">
          <div class="row">
            <div class="col-2">
              <div class="notifications"></div>
            </div>
            <div class="col-10">
              <p style="font-family:'Rancho';font-size:48px;margin-left:4%;margin-top:-4%;margin-bottom:-4%;color: #01161E;">Notification</p>
            </div>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="margin-bottom:3%;font-size:22px;margin-left:3%;"> L'utilisateur Ben khlifa Mohamed El Hedi *********** dans cette offre</p>
        <a target="_blank" href="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/get_emploi')}}" class="card" style="width:160px;margin-top-2%;height:50px;border:none;margin-left:8%;" >
          <div class="row">
            <div class="col-1"></div>
              <div class="col-4">
              <div class="showemploi"></div>
            </div>
            <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:24px;color: #01161E;">
              <p>Voir L'offre</p>
            </div>
          </div>
        </a>
        <a target="_blank" href="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/get_emploi')}}" class="card" style="width:160px;margin-top-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">
          <div class="col-1"></div>
            <div class="col-4">
              <div class="showuser"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:24px;color: #01161E;">
            <p>Voir L'utilisateur</p>
          </div>
        </div>
      </a>
      <a target="_blank" href="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/get_cv')}}" class="card" style="width:160px;margin-top-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">
          <div class="col-1"></div>
            <div class="col-4">
            <div class="showcv"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:24px;color: #01161E;">
              <p>Voir Cv</p>
          </div>
        </div>
      </a>
      <a target="_blank" href="{{url('emplois/'.$emploi->id.'/cvs/'.$cv->id.'/get_test')}}" class="card" style="width:160px;margin-top-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">
          <div class="col-1"></div>
            <div class="col-4">
              <div class="showtest"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:24px;color: #01161E;">
              <p>Voir Test</p>
          </div>
        </div>
      </a>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Accepter</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Refuser</button>
      </div>
    </div>
  </div>
</div>
