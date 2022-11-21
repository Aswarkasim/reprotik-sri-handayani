<div class="row">
    <div class="col-md-12">
      <div class="p-3  card">
        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <tr>
                        <td>NIM</td>
                        <td>{{ $project->nim }}</td>
                    </tr>

                    <tr>
                        <td>Nama Mahasiswa</td>
                        <td>{{ $project->user->name }}</td>
                    </tr>
    
                    <tr>
                        <td>Nama Project</td>
                        <td>{{ $project->name }}</td>
                    </tr>
    
                    <tr>
                        <td>Kategori</td>
                        <td>{{ $project->kategori->name }}</td>
                    </tr>
    
                    <tr>
                        <td>Deskripsi</td>
                        <td>{{ $project->desc }}</td>
                    </tr>
    
                </table>

                @if (isset($project))
                <a href="/admin/project/download?path={{ $project->file }}" class="mt-5"><i class="fas fa-download"></i> Download File</a>
                    {{-- <img src="/{{$project->file}}" width="100%" class="py-3" alt=""> --}}
                @endif
            </div>

            <div class="col-md-6">
                <img src="/{{ $project->cover }}" width="100%" alt="">
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
  
  