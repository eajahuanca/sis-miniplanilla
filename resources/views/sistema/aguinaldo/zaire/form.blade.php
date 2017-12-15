<section class="content">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Aguinaldo</h3>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group {{ $errors->has('agui_tipo_empleado')?' has-error':'' }}">
                    {!! Form::label('agui_tipo_empleado', 'Tipo de Empleado', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            {!! Form::select('agui_tipo_empleado', ['PERMANENTE' => 'Personal Permanente'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group {{ $errors->has('id_empleado')?' has-error':'' }}">
                    {!! Form::label('id_empleado', 'Nombre del Empleado', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-user-md"></i>
                            </div>
                            {!! Form::select('id_empleado', $empleado, null, ['class' => 'form-control chosen-select-deselect', 'id' => 'obtenerSueldo']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('agui_meses')?' has-error':'' }}">
                    {!! Form::label('agui_meses', 'Meses Trabajados', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            {!! Form::number('agui_meses', null, ['placeholder' => '0', 'class' => 'form-control', 'required' => true, 'min' => 1, 'max' => 12]) !!} 
                        </div>
                        @if($errors->has('agui_meses'))
                            <span class="help-block">
                                <strong>{{ $errors->first('agui_meses') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group {{ $errors->has('agui_gestion')?' has-error':'' }}">
                    {!! Form::label('agui_gestion', 'Gestión', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::select('agui_gestion', ['2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020', '2021' => '2021', '2022' => '2022', '2023' => '2023', '2024' => '2024', '2025' => '2025'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Estado del aguinaldo</h3>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group {{ $errors->has('agui_estado')?' has-error':'' }}">
                    {!! Form::label('agui_estado', 'Estado del Aguinaldo', ['class' => 'col-md-12']) !!}
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-unlock"></i>
                            </div>
                            {!! Form::select('agui_estado', [true => 'Habilitado', false => 'Inhabilitado'], null, ['class' => 'form-control chosen-select-deselect']) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::hidden('pag_firma','') !!} 
        </div>
    </div>

</section>
   