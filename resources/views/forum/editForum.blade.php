<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<h1>Modifier le forum : {{$forum->getNom()}}</h1>

{!! Form::model($forum, ['method' => 'PATCH', 'url' => 'forum/'. $forum->getId()]) !!}
@include('forum.form.forum', ['submitButton' => 'Modifier le forum'])

{!! Form::close() !!}
@include('errors.request')
@stop
