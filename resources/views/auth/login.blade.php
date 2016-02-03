@extends('forum')

@section('content')
<h1>Connexion</h1>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> Il y a un problème avec le formulaire.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(['method' => 'POST', 'url' =>  '/auth/login']) !!}
{!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}
<div class="form-group">
    {!! Form::label('email', 'Addresse mail :') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Mot de passe :') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('remember', null, ['class' => 'form-control']) !!}
    {!! Form::label('password', 'Se souvenir de moi') !!}
</div>

<div class="form-group">
    {!! Form::submit('Connexion', ['class' => 'btn btn-primary form-control']) !!}
        <a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
</div>
{!! Form::close() !!}
@endsection
