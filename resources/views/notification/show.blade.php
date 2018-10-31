

<!-- Modal -->
<div class="modal"  id="notification" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="min-width: 50%;">
    <div class="modal-content" >
      <div class="modal-header" style="height:60px;">
        <h5 class="modal-title" id="exampleModalLabel" >
          <div class="row">
            <div class="col-2">
              <div class="notifications" style="margin-top:-25px;"></div>
            </div>
            <div class="col-10">
              <p style="font-family:'Rancho';font-size:32px;margin-left:4%;margin-top:-12%;margin-bottom:-4%;color: #01161E;">Notification</p>
            </div>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p style="margin-bottom:3%;font-size:28px;margin-left:3%;font-family:'Rancho';color:#01161E;"><span>L'utilisateur </span><span style="color:#455a64;">Ben khlifa Mohamed El Hedi</span><span> a postulé à cette offre</span>  </p>
        <a target="_blank" href="#" class="card" style="width:260px;margin-top:-2%;height:50px;border:none;margin-left:8%;" >
          <div class="row">

              <div class="col-4">
              <div class="showemploi"></div>
            </div>
            <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:10px;color: #01161E;">
              <p style="color:#01161E;font-size:20px;font-family:'Rancho';margin-top:-10%;margin-left:-10%;">Voir L'offre</p>
            </div>
          </div>
        </a>

        <a target="_blank" href="#" class="card" style="width:260px;margin-top:-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">

            <div class="col-4">
              <div class="showuser"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:10px;color: #01161E;">
            <p style="color:#01161E;font-size:20px;font-family:'Rancho';margin-top:-10%;margin-left:-10%;">Voir L'utilisateur</p>
          </div>
        </div>
      </a>
      <a target="_blank" href="#" class="card" style="width:260px;margin-top:-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">

            <div class="col-4">
            <div class="showcv"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:10px;color: #01161E;">
              <p style="color:#01161E;font-size:20px;font-family:'Rancho';margin-top:-10%;margin-left:-10%;">Voir Cv</p>
          </div>
        </div>
      </a>
      <a target="_blank" href="#" class="card" style="width:260px;margin-top:-2%;height:50px;border:none;margin-left:8%;" >
        <div class="row">

            <div class="col-4">
              <div class="showtest"></div>
          </div>
          <div class="col-6" style="margin-top:9px;font-family:'Rancho';font-size:10px;color: #01161E;">
              <p style="color:#01161E;font-size:20px;font-family:'Rancho';margin-top:-10%;margin-left:-10%;">Voir Test</p>
          </div>
        </div>
      </a>




      </div>
      <div class="modal-footer">
        <a  href="{{route('accepter')}}" class="btn btn-success" >Accepter</a>
        <a  href="{{route('refuser')}}" type="button" class="btn btn-danger" >Refuser</a>
      </div>
    </div>
  </div>
</div>
