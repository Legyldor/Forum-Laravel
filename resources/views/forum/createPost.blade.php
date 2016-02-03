<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')

<h1>Créer un nouveau post</h1>

{!! Form::open(['url' => 'forum/'. $idForum .'/topic/'. $idTopic . '/post']) !!}
@include('forum.form.post', ['submitButton' => 'Créer le post'])

{!! Form::close() !!}

@include('errors.request')
@stop
@section('script')
<script>

</script>
@stop
