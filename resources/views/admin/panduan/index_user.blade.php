<div class="row">

    @foreach ($panduan as $item)
        
    <div class="col-md-6 m-3">
        <div class="card">
            <div class="card-body">
                <a href="/admin/panduan/download?path={{ $item->file }}&name={{ $item->name }}"><b>{{ $item->name }}</b></a>
            </div>
        </div>
    </div>

    @endforeach

</div>