<style>
  .bg-img-banner{
    background-image: url({{ '/img/project-banner.jpg' }});
    background-color:#3bafda;
    width:100%;
    height:100%;
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
      <h1 class="text-white mt-4">REPROTIK :: Repository Project JTIK</h1>
    </div>

  </div>
</div>



    <div class="container my-2">
      <div class="row">
        @foreach ($project as $item)
        <div class="col-md-3">
          <div class="rounded shadow-sm p-0">
            <div class="img-post-wrapper">
              <img src="/{{ $item->cover == null ? 'img/empty.png' : $item->cover }}" class="img-post" alt="">
            </div>
            <div class="p-2 text-center">
              <hr>
              <p>NIM : {{ $item->nim }}</p>
              <a href="/home/post/show/{{$item->id}}" class="text-decoration-none"><h5><strong>{{$item->name}}</strong></h5></a>
              {{-- <>{!!$item->excerpt!!} <a href="">Baca Selengkapnya &rightarrow;</a></p> --}}
            </div>
          </div>
        </div>
        @endforeach
        
        <div class="d-flex justify-content-center mt-5">
          {{ $project->links() }}
        </div>
    
        
      </div>
    </div>



    
