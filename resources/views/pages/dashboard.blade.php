@extends('layouts.main')
@section('pagename', 'Dashboard')
@section('pagedesc', 'Awesome Dashboard')
@section('tags')
<!-- Prism css-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/prism.css') }}">

<!-- Chartist css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/chartist.css') }}">

<!-- vector map css -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/vector-map.css') }}">
@endsection

@section('content')
<!-- Container-fluid starts-->

<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden  widget-cards">
                <div class="bg-secondary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Total Tokens</span>
                            <h3 class="mb-0"><span class="counter">{{ $getAllTokenCounts }}</span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-primary card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Sold Tokens</span>
                            <h3 class="mb-0"> <span class="counter">{{ $soldTokens }}</span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i class="fa fa-dollar fa-lg"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-warning card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span
                                class="m-0">{{ $totalSchool ? 'Total Registered School' : 'Available Tokens' }}</span>
                            <h3 class="mb-0"><span class="counter">{{ $totalSchool ??  $notUsedorSold }}</span></h3>
                        </div>
                        <div class="icons-widgets">
                            @if ($totalSchool)
                            <i class="fa fa-institution fa-lg"></i>
                            @else
                            <i class="fa fa-edit fa-lg"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 xl-50">
            <div class="card o-hidden widget-cards">
                <div class="bg-success card-body">
                    <div class="media static-top-widget">
                        <div class="media-body"><span class="m-0">Total Token Used</span>
                            <h3 class="mb-0"><span class="counter">{{ $usedTokens }}</span></h3>
                        </div>
                        <div class="icons-widgets">
                            <i data-feather="users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>

<!--apex chart js-->
<script src="{{ asset('js/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('js/chart/apex-chart/stock-prices.js') }}"></script>

<!--chartjs js-->
<script src="{{ asset('js/chart/flot-chart/excanvas.js') }}"></script>
<script src="{{ asset('js/chart/flot-chart/jquery.flot.js') }}"></script>
<script src="{{ asset('js/chart/flot-chart/jquery.flot.time.js') }}"></script>
<script src="{{ asset('js/chart/flot-chart/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('js/chart/flot-chart/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('js/chart/flot-chart/jquery.flot.pie.js') }}"></script>
@endsection
