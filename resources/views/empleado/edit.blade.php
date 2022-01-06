@extends('section.app')


@section('css')

@endsection

@section('title-content')
<strong>Empleado: <small>{{ $empleado->nombres }}</small></strong>
@endsection

@section('title-actions')
<li class="breadcrumb-item">
    <a href="{{ route('empleados.index') }}">Listado</a>
</li>
@endsection



@section('content')
@include('section.msg')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a id="btn-editar" class="btn btn-sm btn-primary waves-effect waves-light pull-right"><i  aria-hidden="true" class="fas fa-pencil-alt"></i> Habilitart Edicion</a>
            </div>

            {!! Form::model($empleado, ['route' => ['empleados.update', $empleado->id], "id" =>"quickForm", 'method' =>
            'PUT','class'=>'needs-validation form-horizontal', 'novalidate']) !!}
            @include('empleado.form', ['btnEtiqueta' => 'Modificar', 'disabled' => true])
            {!! Form::close() !!}
        </div>



    </div>
</div>
@endsection



@section('script')

<script>
    $(function () {
        $("#btn-editar").click(function(){
            $(".form-control").removeAttr("disabled");
            $(".form-check-input").removeAttr("disabled");
            $("#btn-editar").addClass("hide");
            $("#btn-submit").removeClass("hide");
        });
    });
</script>




@endsection