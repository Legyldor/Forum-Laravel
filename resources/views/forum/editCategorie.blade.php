<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<h1>Modifier la catégorie : {{$categorie->getNom()}}</h1>

{!! Form::model($categorie, ['method' => 'PATCH', 'url' => 'categorie/'. $categorie->getId()]) !!}
@include('forum.form.categorie', ['submitButton' => 'Modifier la catégorie'])

{!! Form::close() !!}
@include('errors.request')
@stop