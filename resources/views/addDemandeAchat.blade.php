@extends('voyager::master')
@section('page_header') 
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-2.0.3.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<div class="container">
    <h1 class="page-title">
        Add Demande Achat
    </h1>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <p class="sub-header">     
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form method="POST" action="/demandeAchat" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <!-- <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Reference</label>
                                        <div class="col-md-10">
                                            <input type="text" id="reference" name="reference" class="form-control" required >
                                        </div>
                                    </div>-->
                                    <div class="form-group row" hidden="hidden">
                                        <label class="col-md-2 col-form-label" for="example-service">Services</label>
                                        <!-- --><div class="col-md-10">
                                            <input type="text" id="service" name="service" class="form-control" placeholder="Service" value="{{$array['service']}}"  >
                                       </div> 
                                    </div>
                                    <div class="form-group row" hidden="hidden">
                                        <label class="col-md-2 col-form-label" for="example-User">User</label>
                                        <div class="col-md-10">
                                            <input type="text" id="user" name="user" class="form-control"  value="{{$array['user']}}"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="example-password">Categorie</label>
                                        <div class="col-md-10">
                                            <select name="equipement"  class="form-control" required>
                                                <option value=""></option>
                                                @foreach ($array['categorie'] as $item)
                                                    <option value="{{$item->id}}">
                                                        {{$item->nom_categorie}}
                                                        
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label" for="example-placeholder">Description</label>
                                        <div class="col-md-10">
                                            <textarea id="description" name="description" class="form-control" required></textarea>
                                           
                                        </div>
                                    </div>
                                    <input type="submit" value="Ajouter une demande achat" id="btdemandeAchat" class="btn btn-info waves-effect width-md waves-light" />
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div> <!-- end card-box -->
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
</div> 
    @if(session()->has('message'))
        <script>
            toastr.success("Votre demande est envoyée", 'Success');
        </script>  
    @endif
     @stop