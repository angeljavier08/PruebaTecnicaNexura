@extends('section.app')


@section('css')

@endsection

@section('title-content')
<strong>Empleados</strong>
@endsection

@section('title-actions')
<li class="breadcrumb-item"><a href="{{ route('empleados.index') }}">Listado</a></li>
@endsection



@section('content')
@include('section.msg')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- jquery validation -->
      <div class="card card-primary">
            <div class="card-header">
                <p class="card-title">Crear empleado</p>
            </div>
            {!! Form::open(['route' => ['empleados.store'], "id" =>"quickForm",'class'=>'needs-validation form-horizontal', 'novalidate']) !!}
                @include('empleado.form', ['btnEtiqueta' => 'Guardar', 'disabled' => false])
            {!! Form::close() !!}
        </div>
      </div>
  </div>
@endsection



@section('script')
@endsection
