@extends('templates.template')

@section('titulo', 'Gestion de usuarios')

@section('encabezado', 'Crear usuarios')

@section('contenido')

{!!Form::open(['route' => ['user.store'],'method' => 'post']) !!}

{{Form::label('nombre', 'Nombre de usuario')}}

{!!Form::text('nombre')!!}

{{Form::label('login', 'Login de usuario')}}

{!!Form::text('login')!!}

{{Form::label('password', 'Clave de usuario')}}

{!!Form::password('password')!!}

{!!Form::submit('Guardar') !!}

{!!Form::close() !!}

@endsection