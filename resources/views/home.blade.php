@extends('section.app')


@section('css')

@endsection

@section('title-content')
<strong>Inicio</strong>
@endsection

@section('title-actions')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

@endsection


@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- jquery validation -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Bienvenido</small></h3>
        </div>
        
      
      </div>
      <!-- /.card -->
      </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6">

    </div>
    <!--/.col (right) -->
  </div>
@endsection



@section('script')




@endsection
