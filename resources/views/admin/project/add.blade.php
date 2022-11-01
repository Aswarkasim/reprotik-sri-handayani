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

          @if (auth()->user()->role == 'admin')
              
          <div class="form-group">
            <label for="">NIM</label>
            <input type="text" class="form-control  @error('nim') is-invalid @enderror"  name="nim"  value="{{isset($project) ? $project->nim : old('nim')}}" placeholder="NIM">
             @error('nim')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          @else
          <input type="hidden" name="nim" value="{{ auth()->user()->nim }}">
          @endif

          

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
            <label for="">Kategori</label>
            <select type="text" class="form-control  @error('kategori_id') is-invalid @enderror"  name="kategori_id">
              <option value="">--Kategori--</option>
              @foreach ($kategori as $item)
                  <option value="{{ $item->id }}" {{ isset($project) ? $project->kategori_id == $item->id ? 'selected' :''  :'' }}>{{ $item->name }}</option>
              @endforeach
            </select>
             @error('kategori_id')
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

          <div class="form-group">
            <label for="">Cover</label>
            <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($banner) ? $banner->cover : old('cover')}}" placeholder="cover">
            {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
             @error('cover')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($banner))
                <img src="/{{$banner->cover}}" width="100%" class="py-3" alt="">
            @endif
          </div>

     
          <a href="/admin/project" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

