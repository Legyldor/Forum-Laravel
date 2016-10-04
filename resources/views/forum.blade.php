<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="{{ asset('/css/forum.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <title>Forum</title>
    </head>
    <body id="header_forum">
        <div id="body_forum">
            <div id="container_header_forum" >
                <div id="menu">
                            <ul>
                                <li><a href="/forum">Accueil</a></li>
                                <li><a href="/membre">Membres</a></li>
                                @if(Auth::user() == NULL)
                                    <li><a href="/auth/register">Inscription</a></li>
                                    <li><a href="/auth/login">Connexion</a></li>
                                @else
                                    <li><a href="/membre/{{Auth::user()->getId()}}">{{Auth::user()->getPseudo()}}</a></li>
                                    <li><a href="/auth/logout">Deconnexion</a></li>
                                @endif
                            </ul>
                        </div>
                <div id="div_wallback_forum">
                    <div id="container_forum" class="container">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div id="container_footer_forum" ></div>
        </div>
        @yield('script')
    </body>
</html>
