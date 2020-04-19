@if(session('mensaje'))
    <div class="alert alert-success alert-dismissible fade show"  data-auto-dismiss="3000">
        {{session('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

