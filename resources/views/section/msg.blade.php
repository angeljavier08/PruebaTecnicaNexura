@if (Session::has('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <i class="fa fa-info-circle"></i> {{ Session::get('info') }}
    </div>
@endif




@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-success-circle"></i> {{ Session::get('success') }}
</div>
@endif


@if (Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-danger"></i> {{ Session::get('error') }}
</div>
@endif



@if (Session::has('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-warning"></i> {{ Session::get('warning') }}
</div>
@endif

@if (count($errors))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="fa fa-warning"></i> <strong>Alerta!!</strong>
    <ul>
        @foreach($errors->all() as $error)
            <li style="list-style:none; ">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif