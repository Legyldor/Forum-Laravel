<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="form-group">
    {!! Form::label('topic_titre', 'Titre :') !!}
    {!! Form::text('topic_titre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('post_texte', 'Message :') !!}
    {!! Form::textarea('post_texte', null, ['class' => 'form-control', 'style' => 'font-family: none;']) !!}
</div>

<div class="form-group">
    {!! Form::label('topic_genre', 'Type de message :') !!}
    {!! Form::select('topic_genre', $genres ,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>

