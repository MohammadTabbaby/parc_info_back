
@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Detail inventaire
        </h1>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Detail</th>
                        <th>Date de mise en service</th>
                        <th>Cout Achat (TND)</th>
                        <th>taux amortissement </th>
                        <th>VCN (TND)</th>
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
                                  
                                </ul>
                            </td>
                            <td>{{$e['date_premier_utilisation']}}</td>
                            <td>{{ $e['cout_initiale'] }} TND</td>
                            <td>{{ $e['taux_amortissement'] * 100}} %</td>
                            <td>{{ $e['VCN'] }} TND</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><u>Total</u></td>
                        <td></td>
                        <td>{{ $array['cout_achat']  }} TND</td>
                        <td>{{ $array['taux_amortissement'] * 100}} %</td>
                        <td>{{ $array['total_VCN'] }} TND</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @stop