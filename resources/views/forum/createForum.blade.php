<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<h1>Créer un nouveau forum</h1>

{!! Form::open(['url' => 'forum']) !!}
@include('forum.form.forum', ['submitButton' => 'Créer le forum'])

{!! Form::close() !!}
@stop