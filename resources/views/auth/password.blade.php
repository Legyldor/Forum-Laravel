@extends('forum')

@section('content')

<h1>Réinitialisé mot de passe</h1>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

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
{!! Form::open(['method' => 'POST', 'url' =>  '/password/email']) !!}
{!! Form::hidden('_token', csrf_token(), ['class' => 'form-control']) !!}
    <div class="form-group">
            {!! Form::label('email', 'Addresse mail :') !!}
    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Réinitiliser le mot de passe', ['class' => 'btn btn-primary form-control']) !!}
    </div>
{!! Form::close() !!}
@endsection
