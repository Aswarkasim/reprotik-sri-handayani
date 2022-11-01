<style>
  .bg-img-banner{
    background-image: url({{ '/img/project-banner.jpg' }});
    background-color:#3bafda;
    width:100%;
    height:360px;
  }

  .outline-banner{
    border: 2px solid #e8e8e8;
    background-color: #8cbdf5;
    opacity: 0.7;
    width: 100%;
    border-radius: 7px;
  }
</style>

<div class="bg-img-banner py-4">
  <div class="container">
    <div class="text-center py-5">
      <h1 class="text-light mt-4"><b>REPROTIK :: Repository Project JTIK</b></h1>
    </div>

    
  </div>
</div>

<div class="text-center mt-5">
  {{-- <img src="/img/logo.png" alt="Logo" width="70px" class="" style="opacity: .8"> --}}
  <h3><b>Login</b></h3>
</div>


<div class="container" id="login">
  <div class="row">
    <div class="col-md-7">
      <img src="/img/illustration.png" width="100%" alt="">
    </div>

    <div class="col-md-5">
    @auth
    <div class="card shadow-sm p-5">
      <p class="alert alert-success"><i class="fas fa-check"></i>  <b>Anda telah login</b></p>
      <div class="d-flex">
        <a href="/admin/dashboard" class="px-5 btn btn-success"><i class="fas fa-user"></i> Dashboard</a>
        <a href="/admin/auth/logout" class="px-5 btn btn-secondary mx-2"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </div>
    @else
      <div class="card shadow-sm p-5">

        @if (session()->has('loginError'))      
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('loginError')}}
                 </div>
        @endif

        <form action="/admin/auth/login" method="post">
          @csrf
          <div class="form-group">
          <label for="" class="mb-1"><b>Username</b></label>
          <input type="text" name="nim" class="form-control  @error('nim') is-invalid @enderror" placeholder="NIM">
          @error('nim')
          <div class="invalid-feedback">
            {{$message}}
          </div>
          @enderror
          </div>

          <div class="form-group mt-4">
            <label for="" class="mb-1"><b>Password</b></label>
            <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password">
            @error('password')
            <div class="invalid-feedback">
              {{$message}}
            </div>
            @enderror
          </div>

          <div class="float-end">
            <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-sign-in-alt"></i> Login</button>
          </div>
      </form>

    @endauth


      </div>
    </div>



  </div>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>

<script>
$('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 1000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>