<div class="row">

    
    <div class="col-md-12 m-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @foreach ($video as $item)
                    <div class="col-md-3">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe width="100%" src="https://www.youtube.com/embed/{{ $item->link }}"></iframe>
                        </div>
                        <a href="/admin/video/{{ $item->id }}" class="py-4"><b>{{ $item->name }}</b></a>
                    </div>
                    @endforeach
                </div>
               
            </div>
        </div>
    </div>


</div>

