
<!-- Modal -->
<div class="modal"  id="user" tabindex="-1" role="dialog" aria-labelledby="user" aria-hidden="true">
  <div class="modal-dialog" role="document" style="min-width: 60%;">
    <div class="modal-content" >
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">
          <div class="row">
            <div class="col-6">
              <div class="Profile"></div>
            </div>
            <div class="col-6">
              <p style="font-family:'Rancho';font-size:48px;margin-left:4%;margin-top:-14%;margin-bottom:-14%;color: #01161E;">Profile</p>
            </div>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <img src="{{ $user->avatar}}" style="width:150px;height:150px; float:left; border-radius:50%;margin-right:25px;" >
        <h2>{{$user->name}}</h2>
        <h4>Programmeur</h4>
        <label for="">Telecharger un photo de profile</label>
        <form enctype="multipart/form-data" action="users" method="post">
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="submit" class="pull-right btn btn-sm btn-primary">
        </form>



      </div>
    </div>
  </div>
</div>
