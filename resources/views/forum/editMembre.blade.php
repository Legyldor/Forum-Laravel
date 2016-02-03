<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<h1>Modifier le profil de {{$membre->getPseudo()}}</h1>

{!! Form::model($membre, ['method' => 'PATCH', 'url' => 'membre/'. $membre->getId(), 'files' => true]) !!}
@include('forum.form.membre', ['submitButton' => 'Modifier le profil'])

{!! Form::close() !!}
@include('errors.request')
@stop
