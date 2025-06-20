@extends('layouts.agence')
@section('content')
<div class="row align-items-center mb-2 mb-sm-3">
    <div class="col-xxl-5 col-xl-5 mr-auto">
        <h3 class="mb-1">Welcome {{ Auth::guard()->user()->name}} !</h3>
        <p>The salary of <span class="text-primary">Karla George</span> is pending since 15 january. <a href="#"> Lean more</a></p>
    </div>
    <div class="col-xxl-6 col-xl-7 mt-4 mt-xl-0">
        <div class="row align-items-center secondary-menu text-center justify-content-xxl-end">
            <div class="col-6 col-sm-3 border-right text-left mb-2 mb-md-0">
                <h6 class="mb-0 font-md"><i class="far fa-lightbulb text-success mr-1"></i> Projects</h6>
                <b class="d-block">3,3265</b>
            </div>
            <div class="col-6 col-sm-3 border-0 border-sm-right text-left mb-2 mb-md-0">
                <h6 class="mb-0 font-md"><i class="fas fa-check text-danger mr-1"></i> Task</h6>
                <b class="d-block">6,6484</b>
            </div>
            <div class="col-6 col-sm-3 border-right text-left mb-2 mb-md-0">
                <h6 class="mb-0 font-md"><i class="far fa-calendar-alt text-cyan mr-1"></i> Calendar</h6>
                <b class="d-block">2,2646</b>
            </div>
            <div class="col-6 col-sm-3 text-left mb-2 mb-md-0">
                <h6 class="mb-0 font-md"><i class="far fa-chart-bar text-pink mr-1"></i> Analytics</h6>
                <b class="d-block">4,6587</b>
            </div>
        </div>
    </div>
</div>
@endsection
