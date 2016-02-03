<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
@extends('forum')

@section('content')
<div style="text-align: right">
    {!!$membres->render()!!}
</div>
<table class="table table-hover">
    <thead>
    <th>Avatar</th>
    <th>Pseudo</th>
    <th>Date d'incription</th>
    <th>Dernière visite</th>
    <th>Message</th>

</thead>
<tbody>
    @for ($i=0;$i < count($membres);$i++)
    <tr data-link="/membre/{{$membres[$i]->getId()}}">
        <td>
            <img style="height:auto; width:auto; max-width:38px; max-height:38px;" src="{{asset('img/avatar/'.$membres[$i]->getAvatar())}}" />
        </td>
        <td>{{$membres[$i]->getPseudo()}}</td>
        <td>
            {{$membres[$i]->getDateCreation()}}
        </td>
        <td>
            {{$membres[$i]->getDateLastVisite()}}
        </td>
        <td>
            {{$membres[$i]->getNbPost()}}
        </td>
    </tr>
    @endfor
</tbody>
</table>
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
