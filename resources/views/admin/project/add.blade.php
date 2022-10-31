<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/project/create'))
          <form action="/admin/project" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/project/{{$project->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">NIM</label>
            <input type="text" class="form-control  @error('nim') is-invalid @enderror"  name="nim"  value="{{isset($project) ? $project->nim : old('nim')}}" placeholder="NIM">
             @error('nim')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>
          

          <div class="form-group">
            <label for="">Nama Project</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($project) ? $project->name : old('name')}}" placeholder="Nama Project">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Deskripsi">{{isset($project) ? $project->desc : old('desc')}}</textarea>
            @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
            @enderror
          </div>

        
          <div class="form-group">
            <label for="">File</label>
            <input type="file" class="form-control  @error('file') is-invalid @enderror"  name="file"  value="{{isset($project) ? $project->file : old('file')}}" placeholder="file">
            {{-- <input type="file" class="form-control  @error('file') is-invalid @enderror"  name="file"  placeholder="file"> --}}
             @error('file')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($project))
            <a href="/admin/project/download?path={{ $project->file }}" class="mt-5">Download File</a>
                {{-- <img src="/{{$project->file}}" width="100%" class="py-3" alt=""> --}}
            @endif
          </div>

     
          <a href="/admin/project" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

