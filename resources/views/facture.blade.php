@extends('voyager::master')
@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Detail Facture
        </h1>
        <div class="table-responsive">
            <table id="dataTable" class="table table-hover">
                <thead>
                    <tr>
                        <th>Detail</th>
                        <th>TVA</th>
                        <th>Cout</th>
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
                                    <li>{{ $e['panne'] }}</li>
                                    <li>{{ $e['reference'] }}</li>
                                </ul>
                            </td>
                            <td> {{$e['tva']}}</td>
                            <td>{{ $e['montant_TTC'] }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td><b>Timbre Fiscal</b> </td>
                            <td></td>
                            <td>600</td>            
                        </tr>
                    <tr>
                        <td><u>Total TTC</u></td>
                        <td> </td>
                        <td>{{ $array['total'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @stop