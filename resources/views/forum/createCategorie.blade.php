<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<h1>Créer une nouvelle categorie</h1>

{!! Form::open(['url' => 'categorie']) !!}

    @include('forum.form.categorie', ['submitButton' => 'Créer une catégorie'])

{!! Form::close() !!}
    @include('errors.request')
@stop