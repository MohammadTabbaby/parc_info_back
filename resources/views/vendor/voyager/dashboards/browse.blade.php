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
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-green-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">Total Revenue</h2>
                                                       <p class="font-bold text-3xl"> 
                                                           <?php
                                                                 $string = App\Http\Controllers\WebController::HELLO();
                                                                 echo $string;
                                                            ?>
                                                     <span class="text-green-500"><i class="fas fa-caret-up"></i></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-pink-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">Total Users</h2>
                                                        <p class="font-bold text-3xl">249 <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">New Users</h2>
                                                        <p class="font-bold text-3xl">2 <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-server fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">Server Uptime</h2>
                                                        <p class="font-bold text-3xl">152 days</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-indigo-600"><i class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">To Do List</h2>
                                                        <p class="font-bold text-3xl">7 tasks</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Metric Card-->
                                            <div class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                                                <div class="flex flex-row items-center">
                                                    <div class="flex-shrink pr-4">
                                                        <div class="rounded-full p-5 bg-red-600"><i class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                                    </div>
                                                    <div class="flex-1 text-right md:text-center">
                                                        <h2 class="font-bold uppercase text-gray-600">Issues</h2>
                                                        <p class="font-bold text-3xl">3 <span class="text-red-500"><i class="fas fa-caret-up"></i></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/Metric Card-->
                                        </div>
                                    </div>
                    
                    
                                    <div class="flex flex-row flex-wrap flex-grow mt-2">
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h1 class="font-bold uppercase text-gray-600">Graph</h1>
                                            </div>
                                            <div class="p-5">
                                                <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                                                <script>
                                                    new Chart(document.getElementById("chartjs-7"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April"],
                                                            "datasets": [{
                                                                "label": "Page Impressions",
                                                                "data": [10, 20, 30, 40],
                                                                "borderColor": "rgb(255, 99, 132)",
                                                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                                            }, {
                                                                "label": "Adsense Clicks",
                                                                "data": [5, 15, 10, 30],
                                                                "type": "line",
                                                                "fill": false,
                                                                "borderColor": "rgb(54, 162, 235)"
                                                            }]
                                                        },
                                                        "options": {
                                                            "scales": {
                                                                "yAxes": [{
                                                                    "ticks": {
                                                                        "beginAtZero": true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                                            </div>
                                            <div class="p-5">
                                                <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                                                <script>
                                                    new Chart(document.getElementById("chartjs-0"), {
                                                        "type": "line",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                                            "datasets": [{
                                                                "label": "Views",
                                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                                "fill": false,
                                                                "borderColor": "rgb(75, 192, 192)",
                                                                "lineTension": 0.1
                                                            }]
                                                        },
                                                        "options": {}
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                                            </div>
                                            <div class="p-5">
                                                <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                                                <script>
                                                    new Chart(document.getElementById("chartjs-1"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                                            "datasets": [{
                                                                "label": "Likes",
                                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                                "fill": false,
                                                                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                                                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                                                "borderWidth": 1
                                                            }]
                                                        },
                                                        "options": {
                                                            "scales": {
                                                                "yAxes": [{
                                                                    "ticks": {
                                                                        "beginAtZero": true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Graph Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                            </div>
                                            <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined" height="undefined"></canvas>
                                                <script>
                                                    new Chart(document.getElementById("chartjs-4"), {
                                                        "type": "doughnut",
                                                        "data": {
                                                            "labels": ["P1", "P2", "P3"],
                                                            "datasets": [{
                                                                "label": "Issues",
                                                                "data": [300, 50, 100],
                                                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                                            }]
                                                        }
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <!--/Graph Card-->
                                    </div>
                    
                                        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                            <!--Table Card-->
                                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                                <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                    <h2 class="font-bold uppercase text-gray-600">Graph</h2>
                                                </div>
                                                <div class="p-5">
                                                    <table class="w-full p-5 text-gray-700">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-left text-blue-900">Name</th>
                                                            <th class="text-left text-blue-900">Side</th>
                                                            <th class="text-left text-blue-900">Role</th>
                                                        </tr>
                                                        </thead>
                    
                                                        <tbody>
                                                        <tr>
                                                            <td>Obi Wan Kenobi</td>
                                                            <td>Light</td>
                                                            <td>Jedi</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Greedo</td>
                                                            <td>South</td>
                                                            <td>Scumbag</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Darth Vader</td>
                                                            <td>Dark</td>
                                                            <td>Sith</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                    
                                                    <p class="py-2"><a href="#">See More issues...</a></p>
                    
                                                </div>
                                            </div>
                                            <!--/table Card-->
                                        </div>
                    
                                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                                        <!--Advert Card-->
                                        <div class="bg-white border-transparent rounded-lg shadow-xl">
                                            <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                                <h2 class="font-bold uppercase text-gray-600">Advert</h2>
                                            </div>
                                            <div class="p-5 text-center">
                    
                    
                                                <script async type="text/javascript" src="//cdn.carbonads.com/carbon.js?serve=CK7D52JJ&placement=wwwtailwindtoolboxcom" id="_carbonads_js"></script>
                    
                    
                                            </div>
                                        </div>
                                        <!--/Advert Card-->
                                    </div>
                    
                    
                                    </div>
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
                var table = $('#dataTable').DataTable({!! json_encode(
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
