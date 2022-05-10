
@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Detail bon de commande
        </h1>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Detail</th>
                        <th>Cout (TND)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $equipements = $array['equipements'];
                    ?>
                    @foreach($equipements as $e)
                        <tr>
                            <td>
                                <ul>
                                    <li>{{ $e['reference'] }}</li>
                                    <li>{{ $e['categorie'] }}</li>
                                    <li>{{ $e['modele'] }}</li>
                                    <li>{{ $e['service'] }}</li>
                                </ul>
                            </td>
                            <td>{{ $e['cout'] }} TND</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><u>Total</u></td>
                        <td>{{ $array['total'] }} TND</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @stop