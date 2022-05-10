@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Historique d'Affectation
            </h1>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <tr>
                        <td>N° Changement :</td>
                        <td>Champ</td>
                        <td>De</td>
                        <td>Vers</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $champ = $array['champ'];
                    $w = $array['n'];
    
                    $post_old = $array['post_old'];
                    $post_new = $array['post_new'];
                    ?>
    
                    @for($i=0;$i<$w;$i++) <tr>
                        <td>{{$i}}</td>
                        <td>{{$champ[$i]}}</td>
                        <td>{{$post_old[$i]}}</td>
                        <td>{{$post_new[$i]}}</td>
    
                        </tr>
    
                        @endfor
                </tbody>
            </table>
        </div>
        @stop