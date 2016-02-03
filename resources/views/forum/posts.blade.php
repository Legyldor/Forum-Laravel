<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
@if($ajouter == true)
<p>
    <a href='./post/create' class="btn btn-success">Poster</a>
</p>
@endif

<h3>{{$topic->getTitre()}}</h3>
<div style="text-align: right">
    {!!$posts->render()!!}
</div>
<table class="table table-hover">
    <thead>
    <th>Membre</th>
    <th>Message</th>
    <th></th>
</thead>
<tbody>
    @for ($i=0;$i < count($posts);$i++)
    <tr data-link="./topic/{{$posts[$i]->getId()}}/post">
        <td style="width: 10%;">
            <img style="height:auto; width:auto; max-width:100px; max-height:100px;" src="{{asset('img/avatar/'.$posts[$i]->createur()->first()->getAvatar())}}" />
            <br>
            {{$posts[$i]->createur()->first()->getPseudo()}}
            <br>
            <div style="font-size: 10px">
                {{$posts[$i]->getDateCreation()}}
            </div>
        </td>
        <td style="font-family: none; width: 100%;">
            @if($posts[$i]->getIsDelete() == false)
            {!!$posts[$i]->getTexte()!!}
            @else
            Message supprimé.
            @endif
            <hr>
            {{$posts[$i]->createur()->first()->getSignature()}}
        </td>
        <td>
             
            @if(Auth::user() != NULL) 
            @if ((Auth::user()->rang()->first()->getId() >= $forum->getPermissionModerer()) || (Auth::user()->getId() == $posts[$i]->createur()->first()->getId())) 
            <a href='./post/{{$posts[$i]->getId()}}/edit' class="btn btn-default glyphicon glyphicon-pencil"></a>
            @if($posts[$i]->getIsDelete() == false)
            {!! Form::model($posts[$i], ['method' => 'DELETE', 'url' => 'forum/'. $idForum .'/topic/'. $idTopic.'/post/'.$posts[$i]->getId()]) !!}
            {!! Form::button('', ['class' => 'btn btn-default glyphicon glyphicon-remove', 'type' => 'submit']) !!}
            {!! Form::close() !!}
            @else
            {!! Form::model($posts[$i], ['method' => 'DELETE', 'url' => 'forum/'. $idForum .'/topic/'. $idTopic.'/post/'.$posts[$i]->getId()]) !!}
            {!! Form::button('', ['class' => 'btn btn-default glyphicon glyphicon-repeat', 'type' => 'submit']) !!}
            {!! Form::close() !!}
            @endif
            @endif
            @endif
            <br/>
            @include('errors.request')
        </td>
    </tr>
    @endfor
</tbody>
</table>
@stop

@section('script')
<script>

</script>
@stop