@extends('voyager::master')

@section('css')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    @stop

@section('page_title', __('voyager::generic.viewing').' '.$dataType->getTranslatedAttribute('display_name_plural'))

@section('page_header')
    
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if ($isServerSide)
                            <form method="get" class="form-search">
                                <div id="search-input">
                                    <div class="col-2">
                                        <select id="search_key" name="key">
                                            @foreach($searchNames as $key => $name)
                                                <option value="{{ $key }}" @if($search->key == $key || (empty($search->key) && $key == $defaultSearchKey)) selected @endif>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <select id="filter" name="filter">
                                            <option value="contains" @if($search->filter == "contains") selected @endif>contains</option>
                                            <option value="equals" @if($search->filter == "equals") selected @endif>=</option>
                                        </select>
                                    </div>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="s" value="{{ $search->value }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @if (Request::has('sort_order') && Request::has('order_by'))
                                    <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                    <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                                @endif
                            </form>
                        @endif
                        <div class="table-responsive">
                            <section>
                                <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 pb-24 md:pb-5">
                                    <div class="flex flex-wrap">
                                        
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--équipements Card-->
                                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-desktop fa-2x fa-inverse"></i>
                                                        </div> 
                                                    </div>
                                                    <h2 style="font-size:20px; color:#059669" class="font-bold uppercase text-gray-600">équipements</h2>
                                                    <div class="flex-1 text-right md:text-center">
                                                       <p class="font-bold text-6xl" style="color: #059669;">  
                                                           <?php
                                                                 $tab = App\Http\Controllers\WebController::run();
                                                                 echo $tab['nombre_equipements'];
                                                            ?>
                                                        </p>
                                                     
                                                            
                                                    </div>
                                                </div>
                                                <br>
                                                <ul>
                                                    <?php
                                                    $tab = App\Http\Controllers\WebController::getCountForEachCategorie();
                                                    foreach($tab as $key => $item){
                
                                                    echo ("<li class='font-bold uppercase text-gray-800'>".$key .":".$item."</li>");
                                                    }
                                                    ?>
                                                </ul>
                
                                      
                                            </div>
                                            <!--/équipements Card-->
                                        </div>

                                        
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Interne Card-->
                                            <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <h2 style="font-size:20px; color:#DC2626" class="font-bold uppercase text-gray-600">Reparations Interne</h2>
                                                    <div class="flex-1 text-right md:text-center">
                                                         <p class="font-bold text-6xl" style="color:#DC2626"> 
                                                                <?php
                                                                $tab = App\Http\Controllers\WebController::run();
                                                                echo $tab['nombre_RI'];
                                                                ?>
                                                            
                                                                
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                         
                                            </div>
                                            <!--/Interne Card-->
                                        </div>
                                        

                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Externe Card-->
                                            <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <h2 style="font-size:20px ; color:#4F46E5" class="font-bold uppercase text-gray-600">Reparations Externe</h2>
                                                    <div class="flex-1 text-right md:text-center">
                                                         <p class="font-bold text-6xl" style="color: #4F46E5;"> 
                                                            <?php
                                                            $Resault = App\Http\Controllers\WebController::dashReparartions();
                                                            echo $Resault['nb_Total_Rep_ext'];
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <br>
                                                <ul>
                                                    <?php
                                                    $Resault = App\Http\Controllers\WebController::dashReparartions();

                
                                                    echo ("<li class='font-bold uppercase text-gray-800'> n'a pas encore un Bon de commande : ".$Resault['equips_sans_bc']."</li>
                                                    <li class='font-bold uppercase text-gray-800'> n'a pas encore un Bon de Sortie : ".$Resault['equips_sans_bs']."</li>
                                                    <li class='font-bold uppercase text-gray-800'> n'a pas encore un Bon de Livraison : ".$Resault['equips_sans_bl']."</li>
                                                    <li class='font-bold uppercase text-gray-800'> n'a pas encore une Facture : ".$Resault['equips_sans_fact']."</li>
                                                    ");
                                                    
                                                    ?>
                                                </ul>
                                            
                                            </div>
                                            <!--/Externe Card-->
                                        </div>


                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Pièces Card-->
                                            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-900 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-pink-900"><i class="fas fa-cogs fa-2x fa-inverse"></i></div>
                                                    </div> 
                    
                                        
                                                    </ul>
                                                    <h2 style="font-size:20px; color:#5E0035" class="font-bold uppercase text-gray-600">Pièces de rechange</h2>
                                                    <div class="flex-1 text-right md:text-center">
                                                         <p class="font-bold text-6xl" style="color: #5E0035;">  
                                                            <?php
                                                                  $tab = App\Http\Controllers\WebController::run();
                                                                  echo $tab['nombre_PR'];
                                                             ?>
                                                        </p>
                                                    </div>
                                                   

                                                </div>
                                                <br>
                                               <br>
                                               
                                                
                                                <?php
                                                    $Result = App\Http\Controllers\WebController::getUsedPiece();
                                                    echo ("<h2 style='font-size:25px; color: #5E0035;' class='font-bold uppercase' >Disponibles : ".$Result."</h2>");
                                                ?>
                                                
                                            </div>
                                            <!--/Pièces Card-->
                                        </div>


                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Reclamations Card-->
                                            <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-envelope fa-2x fa-inverse"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h2 style="font-size:20px; color:#D97706" class="font-bold uppercase text-gray-800">Reclamation</h2>
                                                        
                                                    <div class="flex-1 text-right md:text-center">
                                                    
                                                         <p class="font-bold text-6xl" style="color: #D97706;">  
                                                            <?php
                                                                  $tab = App\Http\Controllers\WebController::run();
                                                                  echo $tab['nombre_reclamation'];
                                                             ?>
                                                             
                                                        </p>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                          
                                                

                                                <?php
                                                $tab = App\Http\Controllers\WebController::getReclamationsEnattente();
                                                echo ("<h2  style='font-size:25px;color: #D97706;' class='font-bold uppercase text-gray-800'>En Attente : ". $tab['Reclamations_En_Attente']."</h2>");
                                                ?>
                                            </div>
                                            <!--/Reclamations Card-->
                                        </div>


                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Besoins Card-->
                                            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-600 rounded-lg shadow-xl p-5" style="background-image: linear-gradient(#725ab4, #d8cdf6);">
                                                <div class="flex flex-row items-center" style="border-style: none;">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5" style="background-color: #160F29;"><i class="fas fa-shopping-cart fa-2x fa-inverse"></i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h2 style="font-size:20px; color:#160F29" class="font-bold uppercase text-gray-800">Besoins </h2>
                                                        
                                                    <div class="flex-1 text-right md:text-center">
                                                    
                                                         <p class="font-bold text-6xl" style="color: #160F29;">  
                                                            <?php
                                                                  $tab = App\Http\Controllers\WebController::run();
                                                                  echo $tab['nombre_besoin'];
                                                             ?>
                                                             </p>
                                                    </div>
                                                </div>
                                                    
                                               <br>
                                               <br>
                                 
                                                <?php
                                                    $tab = App\Http\Controllers\WebController::getBesoinsEnattente();
                                                    echo ("<h2 style='font-size:25px; color: #160F29;' class='font-bold uppercase text-gray-800'>En Attente : ". $tab['DemandeAchats_En_Attente']."</h2>");
                                                ?>
                                             </div>
                                            <!--/Besoins Card-->
                                            </div>

                                        </div>

                                </div>

                                <div class="flex flex-row flex-wrap flex-grow mt-2">


                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--table rep ex Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h2 class="font-bold uppercase text-gray-600">Réparations Externes <?php echo(date("Y"))?></h2>
                                            </div>
                                            <div class="p-5">
                                                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                                                <?php
                                                $Resault = App\Http\Controllers\WebController::dashReparartions();
                                                echo("
                                                <script>
                                                    new Chart(document.getElementById('chartjs-1'), {
                                                        'type': 'bar',
                                                        'data': {
                                                            'labels': ['janv', 'févr', 'mars', 'avril', 'mai', 'juin', 'juill', 'août', 'sept', 'oct', 'nov', 'déc'],
                                                            'datasets': [{
                                                                'label': 'Rép Ext',
                                                                'data': [".$Resault['Reparation_ext_ann'][0].",".$Resault['Reparation_ext_ann'][1].",".$Resault['Reparation_ext_ann'][2].",".$Resault['Reparation_ext_ann'][3].",".$Resault['Reparation_ext_ann'][4].",".$Resault['Reparation_ext_ann'][5].",".$Resault['Reparation_ext_ann'][6].",".$Resault['Reparation_ext_ann'][7].",".$Resault['Reparation_ext_ann'][8].",".$Resault['Reparation_ext_ann'][9].",".$Resault['Reparation_ext_ann'][10].",".$Resault['Reparation_ext_ann'][11].",],
                                                                'fill': false,
                                                                'backgroundColor': ['#b30000', '#7c1158', '#424242', '#3d2460', '#06127e', '#45d5f4', '#5ad45a', '#3f110d', '#ebdc78','#ff0080','#ff8000','#9ba5fa'],
                                                                'borderColor': ['#b30000', '#7c1158', '#424242', '#3d2460', '#06127e', '#45d5f4', '#5ad45a', '#3f110d', '#ebdc78','#ff0080','#ff8000','#9ba5fa'],
                                                                'borderWidth': 1
                                                            }]
                                                        },
                                                        'options': {
                                                            'scales': {
                                                                'yAxes': [{
                                                                    'ticks': {
                                                                        'beginAtZero': true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                                </script>");

                                                ?>
                                            </div>
                                        </div>
                                        <!--/table rep ex Card-->
                                    </div>
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h5 class="font-bold uppercase text-gray-600">Réparations Internes </h5>
                                            </div>
                                            <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                                            
                                            <?php
                                                    $Resault = App\Http\Controllers\WebController::dashReparartions();
                                                    echo ("<script>
                                                    new Chart(document.getElementById('chartjs-4'), {
                                                        'type': 'doughnut',
                                                        'data': {
                                                            'labels': ['complétés', 'inaccomplis'],
                                                            'datasets': [{
                                                                'label': 'Réparations Internes',
                                                                'data': [".($Resault['nb_Total_Rep_int']-$Resault['nb_Rep_int_Incomp']).", ".$Resault['nb_Rep_int_Incomp']."],
                                                                'backgroundColor': ['rgb(102, 255, 0)', 'rgb(255, 0, 0)']
                                                            }]
                                                        }
                                                    });

                                                </script>");
                                             
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>

                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h5 class="font-bold uppercase text-gray-600">Réparations Externes</h5>
                                            </div>
                                            <div class="p-5"><canvas id="chartjs-2" class="chartjs" width="undefined" height="undefined"></canvas>
                                            <?php
                                                    $Resault = App\Http\Controllers\WebController::dashReparartions();
                                                    echo ("<script>
                                                    new Chart(document.getElementById('chartjs-2'), {
                                                        'type': 'doughnut',
                                                        'data': {
                                                            'labels': ['complétés', 'inaccomplis'],
                                                            'datasets': [{
                                                                'label': 'Réparations Externes',
                                                                'data': [".($Resault['nb_Total_Rep_ext']-$Resault['nb_Rep_Ext_Incomp']).", ".$Resault['nb_Rep_Ext_Incomp']."],
                                                                'backgroundColor': ['rgb(0, 0, 102)', 'rgb(255, 255, 0)']
                                                            }]
                                                        }
                                                    });

                                                </script>");
                                             
                                                
                                                ?>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>

                                    
                                     <!--Services-->
                                    <div class="flex flex-row flex-wrap flex-grow mt-2">
                                        <div style="width:100%">
                                            <!--Graph Card-->
                                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                                <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                    <h1 class="font-bold uppercase text-gray-600">Equipements et Taux par Service</h1>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nom de Service</th>
                                                            <th>équipements</th>
                                                            <th>Taux d'amortissement</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $tab = App\Http\Controllers\WebController::getAmortissementOfAllServices();
                                                            for($i=0;$i<$tab['compter'];$i++ ){
                                                            echo ("<tr class='font-bold uppercase text-gray-800'>
                                                                <td>". ($i+1) ."</td><td>"
                                                                .$tab['noms_des_services'][$i].
                                                                "</td><td>");
                                                                foreach ( $tab['equipments_details'][$i] as $key => $value ) {
                                                                    print($key .':'.$value.'<br>');
                                                                   }
                                                           
    
                                                            echo "</td><td> <span class='badge badge-info badge-pill float-left mt-3'>" 
                                                            .round($tab['taux_dammort'][$i]*100,2)." % </span></td></tr>";
                                                            }
                                                            ?>
                                                            <!--"Total = ".$tab['nb_equipements_pcs'][$i].-->                                                
            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--/Graph Card-->
                                        </div>
                                    </div>
                                        <!--/Services-->


                                </div>

                            </section>
                    
                        </div>
                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'showSoftDeleted' => $showSoftDeleted,
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->getTranslatedAttribute('display_name_singular')) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function () {
            @if (!$dataType->server_side)
                var table = $('#dataTable').DataTable({!!json_encode(
                    array_merge([
                        "order" => $orderColumn,
                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['targets' => 'dt-not-orderable', 'searchable' =>  false, 'orderable' => false],
                        ],
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!});
            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked')).trigger('change');
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', '__id') }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });
    </script>
@stop