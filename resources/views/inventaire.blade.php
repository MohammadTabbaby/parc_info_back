
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
                        <th>taux amortissement</th>
                        <th>VCN</th>
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
                            <td>{{ $e['taux_amortissement'] }}</td>
                            <td>{{ $e['VCN'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td><u>Totale</u></td>
                        <td>{{ $array['taux_amortissement'] }}</td>
                        <td>{{ $array['total_VCN'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @stop