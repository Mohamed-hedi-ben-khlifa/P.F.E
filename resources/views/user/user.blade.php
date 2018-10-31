
<!-- Modal -->
<div class="modal"  id="users" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="min-width: 60%;">
    <div class="modal-content" >
      <div class="modal-header" style="height:60px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top:-1.6%;">
          <div class="row">
            <div class="col-2">
              <div class="Profile" style="margin-top:10px;"></div>
            </div>
            <div class="col-10">
              <p style="font-family:'Rancho';font-size:32px;margin-left:25px;margin-top:0px;margin-bottom:-4%;color: #01161E;">Profile</p>
            </div>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <img src="{{ $user->avatar}}" style="width:150px;height:150px; float:left; border-radius:50%;margin-right:25px;" >
        <h2 style="margin-top:-0.5%;">{{$user->name}}</h2>
        <h4 style="margin-top:-2%;">Programmeur</h4>
        <label for="">Telecharger un photo de profile</label>
        <form enctype="multipart/form-data" action="users" method="post">
          <input type="file" name="avatar">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="submit" class=" btn btn-sm btn-primary" style="margin-left:200px;" >
        </form>
      </div>
    </div>
  </div>
</div>
