@extends('voyager::master')
@section('page_header')
<div class="container-fluid">
    <h1 class="page-title">
        History
    </h1>
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $Strings = $array['Strings'];
                ?>
                @foreach($Strings as $s)
                <tr>
                    
                    <td>{{$s}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @stop

