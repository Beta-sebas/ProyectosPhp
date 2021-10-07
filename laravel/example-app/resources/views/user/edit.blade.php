@extends('templates.template')

@section('titulo', 'Gestion de usuarios')

@section('encabezado', 'Editar usuarios')

@section('contenido')

{!!Form::model($user, ['route' => ['user.update', $user->idusuario],'method' => 'put']) !!}

{{Form::label('nombre', 'Nombre de usuario')}}

{!!Form::text('nombre')!!}

{{Form::label('login', 'Login de usuario')}}

{!!Form::text('login')!!}

{!!Form::submit('Guardar') !!}

{!!Form::close() !!}

@endsection