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
    <a href='./categorie/create' class="btn btn-success">Ajouter une categorie</a>
</p>
<p>
    <a href='./forum/create' class="btn btn-success">Ajouter un forum</a>
</p>
@endif
@foreach ($categories as $categorie)
<h3>{{$categorie->getNom()}}</h3>

<table class="table table-hover">
    <thead>
    <th>Nom</th>
    <th>Description</th>
    <th></th>
</thead>
<tbody>
    @foreach ($forums as $forum)
    @if($forum->forum_cat_id == $categorie->getId())
    <tr data-link="./forum/{{$forum->getId()}}/topic">
        <td>{{$forum->getNom()}}</td>
        <td style="width: 100%">{{$forum->getDescription()}}</td>
        <td>
            @if(Auth::user() != NULL) 
                @if (Auth::user()->rang()->first()->getId() == 4) 
                    <a href='./forum/{{$forum->getId()}}/edit' class="btn btn-default glyphicon glyphicon-pencil"/>
                @endif
            @endif
        </td>
    </tr>
    @endif
    @endforeach
</tbody>
</table>
@endforeach

@stop

@section('script')
<script>
    jQuery(function ($) {
        $("tr[data-link]").click(function () {
            window.location = this.dataset.link
        });
    })
</script>
@stop