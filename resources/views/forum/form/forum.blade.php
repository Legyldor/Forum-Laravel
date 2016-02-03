<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="form-group">
    {!! Form::label('forum_cat_id', 'Catégorie :') !!}
    {!! Form::select('forum_cat_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('forum_name', 'Titre :') !!}
    {!! Form::text('forum_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('forum_desc', 'Description :') !!}
    {!! Form::textarea('forum_desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('auth_view', 'Autorisation de visionage :') !!}
    {!! Form::select('auth_view', $rangs,null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('auth_post', 'Autorisation de poster :') !!}
    {!! Form::select('auth_post', $rangs, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('auth_topic', 'Autorisation de créer des topics :') !!}
    {!! Form::select('auth_topic', $rangs, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('auth_annonce', 'Autorisation de faire des annonces :') !!}
    {!! Form::select('auth_annonce', $rangs, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('auth_modo', 'Autorisation de modération :') !!}
    {!! Form::select('auth_modo', $rangs, null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>