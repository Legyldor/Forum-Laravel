<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="form-group">
    {!! Form::label('pseudo', 'Pseudo :') !!}
    {!! Form::text('pseudo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email :') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('siteweb', 'Site Web :') !!}
    {!! Form::text('siteweb', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('localisation', 'Localisation :') !!}
    {!! Form::text('localisation', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('avatar', 'Avatar :') !!}
    {!! Form::file('avatar', null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('signature', 'Signature :') !!}
    {!! Form::textarea('signature', null,['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButton, ['class' => 'btn btn-primary form-control']) !!}
</div>