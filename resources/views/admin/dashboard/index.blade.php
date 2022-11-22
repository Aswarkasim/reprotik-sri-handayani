<div class="alert alert-info">Selamat Datang {{auth()->user()->name}} di halaman {{auth()->user()->role}}</div>


@if (auth()->user()->role == 'admin' || auth()->user()->role == 'operator' )
    


<div class="row mt-2">
    
    <div class="col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Total Mahasiswa</span>
          <span class="info-box-number">
            {{ $mahasiswa }}
            <small>Mahasiwa</small>
          </span>
  
        </div>
      </div>
      <!-- /.info-box -->
    </div>


    <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Project</span>
            <span class="info-box-number">
             {{  $project }}
              <small>Project</small>
            </span>
    
          </div>
        </div>
        <!-- /.info-box -->
      </div>


      <div class="col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Kategori</span>
            <span class="info-box-number">
              {{ $kategori }}
              <small>Kategori</small>
            </span>
    
          </div>
        </div>
        <!-- /.info-box -->
      </div>
</div>


@else


<div class="row mt-2">
    
  <div class="col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder-plus"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Project</span>
        <span class="info-box-number">
          {{ $project }}
          <small>Project</small>
        </span>

      </div>
    </div>
    <!-- /.info-box -->
  </div>

</div>



@endif
  