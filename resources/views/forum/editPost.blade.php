<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')

<h1>Modifier le post</h1>

{!! Form::model($post, ['method' => 'PATCH', 'url' => 'forum/'. $idForum .'/topic/'. $idTopic.'/post/'.$post->getId()]) !!}
@include('forum.form.post', ['submitButton' => 'Modifier le post'])

{!! Form::close() !!}

@include('errors.request')
@stop
@section('script')

<script>

</script>
@stop
