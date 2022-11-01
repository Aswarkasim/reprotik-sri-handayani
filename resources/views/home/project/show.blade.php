<div class="mt-4" style="max-width: 800px; margin: 0 auto">
    <div class="text-center">
        <h4><strong>{{ $project->name }}</strong></h4>
        <hr>
    </div>
    <div class="row">
        <div class="col-md-4">
            <img src="/{{ $project->cover == null ? 'img/empty.png' : $project->cover }}" class="img-post" alt="">
        </div>
        <div class="col-md-8">
           <a href="/home/project" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
<br><br>
           <table class="table">
                <tr>
                    <td>NIM</td>
                    <td>: {{ $project->nim  }}</td>
                </tr>
                <tr>
                    <td>Nama Mahasiswa</td>
                    <td>: {{ isset($project->user) ? $project->user->name : 'Data tidak ditemukan'  }}</td>
                </tr>

                <tr>
                    <td>No Hp</td>
                    <td>: {{ isset($project->user) ? $project->user->nohp : 'Data tidak ditemukan'  }}</td>
                </tr>

                <tr>
                    <td>Nama Project</td>
                    <td>: {{ $project->name  }}</td>
                </tr>
                <tr>
                    <td>Kategori Project</td>
                    <td>: {{ isset($project->kategori) ? $project->kategori->name : 'Data tidak ditemukan'  }}</td>
                </tr>
                <tr>
                    <td>Ditambahkan pada :</td>
                    <td>: {{ $project->created_at  }}</td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td>: {{ $project->desc  }}</td>
                </tr>
       
           </table>

           <a href="/home/project/download?path={{ $project->file }}" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
        </div>
    </div>
</div>