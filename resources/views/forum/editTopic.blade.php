<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')

<h1>Modifier le topic : {{$topic->getTitre()}}</h1>

{!! Form::model($topic, ['method' => 'PATCH', 'url' => 'forum/'. $idForum .'/topic/'. $topic->getId()]) !!}
@include('forum.form.editTopic', ['submitButton' => 'Modifier le topic'])

{!! Form::close() !!}

@include('errors.request')
@stop
