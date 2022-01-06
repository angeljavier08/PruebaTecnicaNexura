<div class="card-body">

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        Los campos con asterisco (*) son obligatorio
    </div>

    <div class="form-group row">
        {!! Form::label('nombres', 'Nombre completo *', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::text('nombres', $empleado->nombres, ["id"=>"nombres","placeholder"=>"Nombre completo del empleado"
            ,'class' => 'form-control soloLetras', 'disabled' => $disabled,'required'])
            !!}
             <div class="invalid-feedback">
            Por favor escriba nombres.
        </div>
        </div>
       
    </div>


    <div class="form-group row">
        {!! Form::label('email', 'Correo electrónico *', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::email('email', $empleado->email, ["id"=>"email","placeholder"=>"Correo electrónico" ,'class' =>
            'form-control', 'disabled' => $disabled,'required']) !!}
            <div class="invalid-feedback">
                Por favor escriba un email.
            </div>
        </div>

    </div>

    <div class="form-group row">
        {!! Form::label('sexo', 'Sexo *', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" value="M" @if($empleado->sexo == "M") checked
                @endif @if($disabled) disabled @endif required='required'>
                <label class="form-check-label" for="sexo">
                    Masculino
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sexo" value="F" @if($empleado->sexo == "F") checked
                @endif @if($disabled) disabled @endif required='required'>
                <label class="form-check-label" for="sexo">
                    Femenino
                </label>
                <div class="invalid-feedback">
                    Por favor selecciona un sexo.
                </div>
            </div>

            


        </div>
    </div>




    <div class="form-group row">
        {!! Form::label('area', 'Área', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            {!! Form::select('area', $areas, $empleado->area, ['class' => 'form-control', 'disabled' =>
            $disabled,'required']) !!}
            <div class="invalid-feedback">
                Por favor seleccione un area.
            </div>
        </div>
    </div>


    <div class="form-group row">
        {!! Form::label('descripcion', 'Descripción', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">

        {!! Form::textarea('descripcion', $empleado->descripcion, [ "rows"=>"4", "cols"=>"50", 'class' =>
        'form-control', 'disabled' => $disabled,'required']) !!}

        <div class="invalid-feedback">
            Por favor seleccione una descripcion.
        </div>
    </div>
    </div>


    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
          <div class="form-check">
            <input  @if($empleado->boletin == 1) checked  @endif @if($disabled) disabled @endif type="checkbox" class="form-check-input" id="boletin" name="boletin">
            <label class="form-check-label" for="boletin">Deseo recibir boletín informativo</label>
          </div>
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label('roles', 'Roles *', ["class"=>"col-sm-2 col-form-label"]) !!}
        <div class="col-sm-10">
            @foreach ($roles as  $rol)
            <div class="form-check">
                <input  required='required' class="form-check-input roles_empleado" type="checkbox" name="roles[]" value="{{ $rol->id}}" @if($empleado->roles($rol->id)) checked
                @endif @if($disabled) disabled @endif>
                <label class="form-check-label" for="sexo">
                   {{ $rol->nombre }}
                </label>
            </div>
            @endforeach

            <div id="roles" class="invalid-feedback">
                Por favor seleccione al menos un rol.
            </div>


        </div>
    </div>


    <div class="form-group">
        {!! Form::submit($btnEtiqueta, ['id' => 'btn-submit','class' => 'btn btn-primary pull-right hide']) !!}
    </div>


  



    @if(!$disabled)
    <div class="form-group">
        {!! Form::submit($btnEtiqueta, ['class' => 'btn btn-primary pull-right']) !!}
    </div>
    @endif

</div>