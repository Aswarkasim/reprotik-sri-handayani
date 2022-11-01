<div class="text-center mt-5">
    {{-- <img src="/img/logo.png" alt="Logo" width="70px" class="" style="opacity: .8"> --}}
    <h3><b>Register</b></h3>
  </div>

  

<div class="container mt-5" id="login">
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
  
          <form action="/home/register" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="mb-1"><b>Nama</b></label>
                <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" placeholder="Nama">
                @error('name')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="" class="mb-1"><b>NIM</b></label>
                <input type="text" name="nim" class="form-control  @error('nim') is-invalid @enderror" placeholder="NIM">
                @error('nim')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="" class="mb-1"><b>Angkatan</b></label>
                <select name="angkatan" class="form-control  @error('angkatan') is-invalid @enderror">
                  <option value="">--Angkatan--</option>
                  @for ($i = 2009; $i <= $current_year; $i++)
                  <option value="{{ $i }}">{{ $i }}</option>
                  @endfor
                </select>
                @error('angkatan')
                    <div class="invalid-feedback">
                    {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group mt-4">
                <label for="" class="mb-1"><b>No HP</b></label>
                <input type="text" name="nohp" class="form-control  @error('nohp') is-invalid @enderror" placeholder="No HP">
                @error('nohp')
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

            <div class="form-group mt-4">
                <label for="" class="mb-1"><b>Konfirmasi Password</b></label>
                <input type="password" name="re_password" class="form-control  @error('re_password') is-invalid @enderror" placeholder="Konfirmasi Password">
                @error('re_password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            
  
            <div class="float-end">
              <button type="submit" class="btn btn-primary mt-4"><i class="fas fa-sign-in-alt"></i> Register</button>
            </div>
        </form>
  
      @endauth
  
  
        </div>
      </div>
  
  
  
    </div>
  </div>