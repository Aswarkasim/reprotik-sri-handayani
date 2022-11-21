<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/panduan/create'))
          <form action="/admin/panduan" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/panduan/{{$panduan->id}}" method="POST"  enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($panduan) ? $panduan->name : old('name')}}" placeholder="Nama">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">File</label>
            <input type="file" class="form-control  @error('file') is-invalid @enderror"  name="file">
             @error('file')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <a href="/admin/panduan" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

