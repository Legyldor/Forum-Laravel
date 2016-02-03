<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<table class="table">
    <tr>
        <td>Pseudo</td>
        <td>{{$membre->getPseudo()}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$membre->getEmail()}}</td>
    </tr>
    <tr>
        <td>Avatar</td>
        <td>
            <img style="vertical-align: bottom; height:auto; width:auto; max-width:100px; max-height:100px;" src="{{asset('img/avatar/'.$membre->getAvatar())}}" />
            <img style="vertical-align: bottom; height:auto; width:auto; max-width:76px; max-height:76px;" src="{{asset('img/avatar/'.$membre->getAvatar())}}" />
            <img style="vertical-align: bottom; height:auto; width:auto; max-width:38px; max-height:38px;" src="{{asset('img/avatar/'.$membre->getAvatar())}}" />  
        </td>
    </tr>
    <tr>
        <td>Site web</td>
        <td>{{$membre->getSiteweb()}}</td>
    </tr>
    <tr>
        <td>Localisation</td>
        <td>{{$membre->getLocalisation()}}</td>
    </tr>
    <tr>
        <td>Date d'inscription</td>
        <td>{{$membre->getDateInscription()}}</td>
    </tr>
    <tr>
        <td>Signature</td>
        <td>{!!$membre->getSignature()!!}</td>
    </tr>
</table>
<div style="text-align: center">
    @if(Auth::user() != NULL) 
        @if(Auth::user()->getId() == $membre->getId())
            <a href='{{$membre->getId()}}/edit' class="btn btn-default">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Modifier
            </a>
        @endif
    @endif
</div>
@stop

@section('script')

@stop