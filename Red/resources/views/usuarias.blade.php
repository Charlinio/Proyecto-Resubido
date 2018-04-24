@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuarios</div>

                <div class="card-body">
                  @if($errors->any())
                    <div class="alert alert-warning alert-dismissable">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  @if(session()->has('mensaje'))
                    <div class="alert alert-success">
                      {{ session()->get('mensaje') }}
                    </div>
                  @endif
                  {{ Form::open(array('url' => '/admin/usuarios', 'files' => true)) }}
                    <div class="input-group col-md-12">
                      <label for="nombre">Nombre: </label>
                      {{ Form::text('nombre', '', array('class' => 'form-control', 'placeholder' => 'Nombre')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      <label for="correo">Correo: </label>
                      {{ Form::email('correo', '', array('class' => 'form-control', 'placeholder' => 'Correo')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      <label for="p1">Contraseña: </label>
                      {{ Form::password('p1', array('class' => 'form-control', 'placeholder' => 'Contraseña')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      <label for="p2">Confirmar Contraseña: </label>
                      {{ Form::password('p2', array('class' => 'form-control', 'placeholder' => 'Confirmar Contraseña')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      <label for="nivel">Nivel: </label>
                      {{ Form::select('nivel', array('Administrador', 'Normal'), array('class' => 'form-control', 'placeholder' => 'Confirmar Contraseña')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      <label for="imagen">Imagen: </label>
                      {{ Form::file('imagen', array('class' => 'form-control', 'placeholder' => 'Imagen')) }}
                    </div>
                    <br>
                    <div class="input-group col-md-12">
                      {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
                    </div>
                  {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
