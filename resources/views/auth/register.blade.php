@extends('forum')

@section('content')
<h1>Enregistrement</h1>
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
{!! Form::open(['method' => 'POST', 'url' =>  '/auth/register']) !!}
{!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}

    <div class="form-group">
        {!! Form::label('pseudo', 'Pseudonyme :') !!}
    {!! Form::text('pseudo', old('pseudo'), ['class' => 'form-control']) !!}
    </div>

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
        {!! Form::label('siteweb', 'Site Web :') !!}
    {!! Form::text('siteweb', old('siteweb'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('localisation', 'Localisation :') !!}
    {!! Form::text('localisation', old('localisation'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('signature', 'Signature :') !!}
    {!! Form::textarea('signature', old('signature'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit("S'enregistrer", ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

    @endsection
