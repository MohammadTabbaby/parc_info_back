
@extends('voyager::master')
@section('page_header')  

<header>
  <!-- Bootstrap Css -->
  <link href="../assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="../assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

</header>
  
        <h1 class="page-title">
            Add Reclamation
        </h1>
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="header-title">Add Reclamation</h4>
                        <p class="sub-header">     
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Text</label>
                                            <div class="col-md-10">
                                                <input type="text" id="simpleinput" class="form-control" value="Some text value...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="example-password">Password</label>
                                            <div class="col-md-10">
                                                <input type="password" id="example-password" class="form-control" value="password">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label" for="example-placeholder">Placeholder</label>
                                            <div class="col-md-10">
                                                <input type="text" id="example-placeholder" class="form-control" placeholder="placeholder">
                                            </div>
                                        </div>
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
           
    @stop