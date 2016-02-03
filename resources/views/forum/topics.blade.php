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
    <a href='./topic/create' class="btn btn-success">Ajouter un topic</a>
</p>
@endif
<h3>{{$forum->getNom()}}</h3>
<div style="text-align: right">
    {!!$topics->render()!!}
</div>
<table class="table table-hover">
    <thead>
    <th>Genre</th>
    <th>Titre</th>
    <th>Dernier Message</th>
    <th></th>
</thead>
<tbody>
    @for ($i=0;$i < count($topics);$i++)
    <tr data-link="./topic/{{$topics[$i]->getId()}}/post">
        <td>{{$topics[$i]->genre()->first()->getNom()}}</td>
        <td style="width: 100%">
            {{$topics[$i]->getTitre()}}
        </td>
        <td style="font-size: 10px;text-align: center;">
            <img style="height:auto; width:auto; max-width:38px; max-height:38px;" title="De : {{$lastPosts[$i]->createur()->first()->getPseudo()}} Le : {{$lastPosts[$i]->getDateCreation()}}" data-toggle="tooltip" data-placement="right" src="{{asset('img/avatar/'.$lastPosts[$i]->createur()->first()->getAvatar())}}" />
        </td>
        <td>
            @if(Auth::user() != NULL) 
                @if (Auth::user()->rang()->first()->getId() >= $forum->getPermissionModerer()) 
                    <a href='./topic/{{$topics[$i]->getId()}}/edit' class="btn btn-default glyphicon glyphicon-pencil"/>
                @endif
            @endif
        </td>
    </tr>
    @endfor
</tbody>
</table>
@stop

@section('script')
<script>
     $(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
    jQuery(function ($) {
        $("tr[data-link]").click(function () {
            window.location = this.dataset.link;
            
        });
    });
</script>
@stop