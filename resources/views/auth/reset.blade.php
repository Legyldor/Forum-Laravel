@extends('forum')

@section('content')
<h1>Reset le mot de passe</h1>

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
{!! Form::open(['method' => 'POST', 'url' =>  '/password/reset']) !!}
{!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}
{!! Form::hidden('token', $token, ['class' => 'form-control']) !!}

    <div class="form-group">
        {!! Form::label('email', 'Adresse mail :') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Mot de passe :') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirmation du mot de passe :') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

<div class="form-group">
        {!! Form::submit("Réinitialiser le mot de passe", ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection
