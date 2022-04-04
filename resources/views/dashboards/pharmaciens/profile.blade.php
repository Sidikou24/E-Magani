@extends('dashboards.pharmaciens.layouts.pharmacien-dash-layout')

@section('title','Profile')

@section('content')


<div class="content-wrapper" style="min-height: 2646.8px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('voir_pharmacie')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('pharmacien.profile')}}">User Profile</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle pharmacien_picture" src="{{Auth::user()->image}}" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center pharmacien_name">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center" >{{Auth::user()->fonction}}</p>
              <input type="file" name="pharmacien_image" id="pharmacien_image"  style="opacity:0;height:1px;dispaly:none;" >
             
              <a href="javascript:void(0)" class="btn btn-primary btn-block" id="changer_image_btn"><b>Change Picture</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#personnal_info" data-toggle="tab">Personnal Information</a></li>
                <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change password</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="personnal_info">
                  <form class="form-horizontal" method="POST" action="{{route('pharmacienUpdateInfo')}}" id="PharmacienInfoForm">
                    {{ csrf_field() }}
                    @if(Session::get('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::get('error'))
                    <<div class="alert alert-danger">
                      {{Session::get('error')}}
                </div>
                @endif
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Nom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Nom" value="{{Auth::user()->name }}" name="name">
                    <span class="text-danger error-text name_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="prenom" class="col-sm-2 col-form-label">Prenom</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" placeholder="Prenom" value="{{Auth::user()->prenom }}" name="prenom">
                    <span class="text-danger error-text Prenom_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email }}" name="email">
                    <span class="text-danger error-text email_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fonction" class="col-sm-2 col-form-label">Fonction *</label>
                  <div class="col-sm-10">
                    <input type="text" id="fonction" class="form-control" name="fonction" list="fon" required value="{{Auth::user()->fonction }}">
                    <!-- pattern="[Ee]mployé|[Pp]harmacien" -->
                    <span class="text-danger error-text fonction_error"></span>
                    <datalist id="fon">
                      <option>pharmacien</option>
                      <option>Employé</option>
                    </datalist>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="num_reference" class="col-sm-2 col-form-label">Numero de Reference *</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="num_reference" name="num_reference" value="{{Auth::user()->num_reference }}" placeholder="entrer votre Numero de Reference" value="{{Auth::user()->num_reference }}">
                    <span class="text-danger error-text num_reference_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="dateNaiss" class="col-sm-2 col-form-label">Date de Naissance</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" id="dateNaiss" name="dateNaiss" required autocomplete="dateNaiss" autofocus value="{{Auth::user()->dateNaiss }}">
                    <span class="text-danger error-text dateNaiss_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="pays" class="col-sm-2 col-form-label">Pays *</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="pays" name="pays" value="{{Auth::user()->pays }}" required autocomplete="pays">
                    <span class="text-danger error-text v_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="ville" class="col-sm-2 col-form-label">Ville *</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="ville" name="ville" value="{{Auth::user()->ville }}" required autocomplete="ville" autofocus>
                    <span class="text-danger error-text ville_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="codePostal" class="col-sm-2 col-form-label">Code postal *</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="codePostal" name="codePostal" value="{{Auth::user()->codePostal }}" required autocomplete="codePostal" autofocus>
                    <span class="text-danger error-text codePostal_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="numTel" class="col-sm-2 col-form-label">Téléphone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="numTel" name="numTel" value="{{Auth::user()->numTel }}" required autocomplete="numTel" autofocus>
                    <span class="text-danger error-text numTel_error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="sexe" class="col-sm-2 col-form-label">Sexe :</label>
                  <div class="col-sm-10">
                    <input type="radio" id="masculin" name="sexe" value="masculin" required>
                    <label for="masculin">Masculin</label>
                    <input type="radio" id="feminin" name="sexe" value="feminin" required>
                    <label for="feminin">Feminin</label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="offset-sm-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Enregistrer les modifications</button>
                  </div>
                </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class=" tab-pane" id="change_password">
                <form class="form-horizontal" action="{{route('pharmacienChangePassword')}}" method="POST" id="changePasswordPharmacienForm">
                   {{ csrf_field() }}
                   @if(Session::get('success'))
                    <div class="alert alert-success">
                      {{Session::get('success')}}
                    </div>
                    @endif
                    @if(Session::get('error'))
                    <div class="alert alert-danger">
                      {{Session::get('error')}}
                </div>
                @endif
                  <div class="form-group row">
                    <label for="oldpassword" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="oldpassword" placeholder="Entrer Current password" name="oldpassword" >
                      <span class="text-danger error-text oldpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="newpassword" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="newpassword" placeholder="Entrer new password" name="newpassword" >
                      <span class="text-danger error-text newpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cnewpassword" class="col-sm-2 col-form-label">Confirm New Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="cnewpassword" placeholder="ReEntrer new password" name="cnewpassword" >
                      <span class="text-danger error-text cnewpassword_error"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

@endsection
