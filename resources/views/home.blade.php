@extends('layouts.admin')
@section('content')
<div class="row align-items-center mb-2 mb-sm-3">
    <div class="col-xxl-5 col-xl-5 mr-auto">
        <h3 class="mb-1">Welcome Arioxa template!</h3>
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
<div class="row multi-chart-wrap">
    <div class="col-xxl-3 col-lg-6 mb-3">
        <div class="card card-statistics h-100 mb-0">
            <div class="p-2">
                <div class="d-flex">
                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Visitors</p>
                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                </div>
                <div class="d-block d-sm-flex h-100 align-items-end pb-2">
                    <div class="apexchart-wrapper my-1">
                        <div id="analytics7"></div>
                    </div>
                    <div class="statistics my-1 ml-sm-auto text-center text-sm-right">
                        <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> 12,478</h3>
                        <p>Weekly visitor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-6 mb-3">
        <div class="card card-statistics h-100 mb-0 overflow-hidden">
            <div class="p-2">
                <div class="d-flex">
                    <p class="mb-0 font-regular text-muted font-weight-bold">Total Profit</p>
                    <div class="ml-auto">
                     <h5 class="mb-0"><i class="icon-arrow-up-circle"></i> 15,235</h5>
                        <p>This Week</p>
                        </div>
                </div>
                <div class="d-block d-sm-flex h-100 align-items-center">
                    <div class="apexchart-wrapper mt-n3">
                        <div id="analytics8" class="chart-fit"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-6 mb-3">
        <div class="card card-statistics h-100 mb-0">
            <div class="p-2">
                <div class="d-flex">
                    <div class="mr-2">
                    <h3 class="mb-0 d-block"><i class="icon-arrow-up-circle"></i>569</h3>
                        <p>Earning per day</p>
                        <a class="btn btn-light btn-sm mt-3" href="#">Yearly</a>
                        </div>
                         <div class="d-block d-sm-flex h-100 align-items-center">
                    <div class="apexchart-wrapper my-1">
                        <div id="analytics9"></div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-6 mb-3">
        <div class="card card-statistics h-100 mb-0">
            <div class="p-2 d-block">
                <div class="d-flex mb-2">
                    <p class="mb-0 font-regular text-muted font-weight-bold">Overall Statistics</p>
                    <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                </div>
                  <div class="d-sm-flex align-items-center">
                <div class="apexchart-wrapper">
                    <div id="analytics10"></div>
                </div>
                <div class="statistics">
                    <ul class="list-style-none pt-2">
                        <li class="d-flex pb-1">
                            <span><i class="far fa-circle text-primary pr-2"></i>Annual Sales</span> <span class="pl-1 font-weight-bold">658</span></li>
                        <li class="d-flex pb-1"><span><i class="far fa-circle text-warning pr-2"></i> Annual Revenue</span> <span class="pl-1 font-weight-bold">356</span></li>
                        <li class="d-flex pb-1"><span><i class="far fa-circle text-info pr-2"></i> Free Cash Flow</span> <span class="pl-1 font-weight-bold">235</span></li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xxl-8 col-xl-7 mb-3">
        <div class="card card-statistics mb-0 h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h5 class="card-title">Site analysis</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-xs-4">
                        <div class="row mb-2 align-items-end">
                            <div class="col">
                                <p>Users</p>
                                <h3 class="tex-dark mb-0">5.7K</h3>
                            </div>
                            <div class="col ml-auto">
                                <span><i class="fas fa-arrow-down"></i> 3.4%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xs-4">
                        <div class="row mb-2 align-items-end">
                            <div class="col">
                                <p>Bounce rate</p>
                                <h3 class="tex-dark mb-0">245K</h3>
                            </div>
                            <div class="col ml-auto">
                                <span><i class="fas fa-arrow-up"></i> 12%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-xs-4">
                        <div class="row mb-2 align-items-end">
                            <div class="col">
                                <p>Session duration</p>
                                <h3 class="tex-dark mb-0">5.3K</h3>
                            </div>
                            <div class="col ml-auto">
                                <span><i class="fas fa-arrow-down"></i> 8.4%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 px-0">
                        <div class="apexchart-wrapper position-inherit">
                            <div id="analytics1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-4 col-xl-5 mb-3">
        <div class="card card-statistics bg-primary mb-0 h-100">
            <div class="card-header d-flex justify-content-between border-0">
                <div class="card-heading">
                    <h5 class="card-title text-white">Sales reports</h5>
                </div>
                <div class="dropdown">
                    <a class="p-2 text-white" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-circle"></i>
                    </a>
                    <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                        <h6 class="mb-1">Action</h6>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                        <h6 class="mb-1 mt-3">Export</h6>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-pdf pr-2"></i>Export to PDF</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-excel pr-2"></i>Export to CSV</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="img-fluid mb-3 w-75" src="assets/img/support.svg" alt="">
                        <h2 class="text-white">4.2k</h2>
                        <span class="d-block mb-1 font-16 text-white">Affiliate Revenue</span>
                        <span class="d-block mb-1 text-white"><b class="text-white">-45.47%</b> vs last 1 Week</span>
                        <p class="mb-0 text-white px-5">Give yourself the power of responsibility. Remind yourself the only thing stopping.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xxl-4 mb-3">
        <div class="card card-statistics mb-0 h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h5 class="card-title">Total Expenses</h5>
                </div>
                <div class="dropdown">
                    <select class="custom-select custom-select-sm" id="inputGroupSelect01">
                        <option value="1">Last week</option>
                        <option value="2">Last month</option>
                        <option value="3">Last year</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xxs-6">
                        <span class="font-17">Total Earning</span>
                        <h3 class="mt-1 mb-1">$54,356</h3>
                        <span class="d-block"> <i class="fas fa-chevron-down text-primary"></i> <b class="text-primary">+26%</b> Vs last Week </span>
                    </div>
                    <div class="col-xxs-6">
                        <span class="font-17">Total amount</span>
                        <h3 class="mt-1 mb-1">$5,789</h3>
                        <span class="d-block"> <i class="fas fa-chevron-down text-cyan"></i> <b class="text-cyan">+45%</b> Vs last Week </span>
                    </div>
                </div>
                <div class="apexchart-wrapper">
                    <div id="analytics3" class="chart-fit"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xxl-4 mb-3">
        <div class="card card-statistics mb-0 h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h5 class="card-title">Actions History</h5>
                </div>
                <div class="dropdown">
                    <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                        <h6 class="mb-1">Action</h6>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="activity">
                    <li class="activity-item primary">
                        <div class="activity-icon text-primary">
                            <i class="fe fe-bell"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0">Planning new project structure. </h6>
                            <span>Mon, 11 Jan</span>
                        </div>
                    </li>
                    <li class="activity-item info">
                        <div class="activity-icon text-info">
                            <i class="fe fe-box"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0">Start new Theme with designer.</h6>
                            <span>
                                        Fri, 20 Jan
                                    </span>
                        </div>
                    </li>
                    <li class="activity-item success">
                        <div class="activity-icon text-success">
                            <i class="fe fe-check-square"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0">Meeting with sales and team. </h6>
                            <span>
                                        Tue, 14 Feb
                                    </span>
                        </div>
                    </li>
                    <li class="activity-item danger">
                        <div class="activity-icon text-danger">
                            <i class="fe fe-layers"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0">  Assign task for Smith.  </h6>
                            <span>
                                        Wed, 23 Mar
                                    </span>
                        </div>
                    </li>
                    <li class="activity-item warning">
                        <div class="activity-icon text-warning">
                            <i class="fe fe-map"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0">Launch a new product series</h6>
                            <span>12:00</span>
                        </div>
                    </li>
                    <li class="activity-item info">
                        <div class="activity-icon text-info">
                            <i class="fe fe-printer"></i>
                        </div>
                        <div class="activity-info">
                            <h6 class="mb-0"> Meeting with CEO.</h6>
                            <span>
                                        Thu, 25 June
                                    </span>
                        </div>
                    </li>
                    <li class="activity-item success">
                        <div class="activity-icon text-success">
                            <i class="fe fe-slack"></i>
                        </div>
                         <div class="activity-info">
                            <h6 class="mb-0">Project Submitted.</h6>
                            <span>
                                        Mon, 12 July
                                    </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xxl-4 mb-3">
        <div class="card card-statistics mb-0 h-100">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h5 class="card-title">Recent Post</h5>
                </div>
                <div class="dropdown">
                    <a class="btn btn-round btn-inverse-primary btn-xs" href="#">View all </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/01.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">It Does More. It’s that Simple </a></h6>
                        <span>05, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/02.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">For the next generation of big businesses </a></h6>
                        <span>12, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/03.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">Great computing starts with Intel inside </a></h6>
                        <span>30, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/04.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">This time is used also to put things</a></h6>
                        <span>30, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/02.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">For the next generation of big businesses inside </a></h6>
                        <span>12, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center mb-1">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/03.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">Great computing starts with Intel inside </a></h6>
                        <span>30, Jun 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xs-2">
                        <img class="img-fluid border-radius" src="assets/img/blog/05.jpg" alt="">
                    </div>
                    <div class="col-xs-7 mt-2 mt-sm-0">
                        <h6 class="mb-0"> <a href="#">There are basically six key starts with achievement </a></h6>
                        <span>20, Sep 2020</span>
                    </div>
                    <div class="col-xs-3 mt-1 mt-sm-0 mb-3 mb-sm-0 text-left text-xs-right">
                        <a class="btn btn-xs btn-inverse-primary" href="#"> Read more </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-xxl-8 mb-3">
            <div class="card card-statistics mb-0 h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-7">
                            <h5 class="card-title mb-1">Site Geolocation</h5>
                            <p class="mb-3">Make a list of your achievements toward your long-term goal and remind yourself that.</p>
                                <div class="table-responsive">
                                    <table class="table table-border-3">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/google.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Google</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$251.3</span>
                                                </td>
                                                <td>11 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/envato.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Envato</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$564.44</span>
                                                </td>
                                                <td>8 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/invision.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Invision</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$351.23</span>
                                                </td>
                                                <td>5 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/slack.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Slack</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$784.23</span>
                                                </td>
                                                <td>5 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/bootstrap.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Bootstrap</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$657.48</span>
                                                </td>
                                                <td>4 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <div class="avatar avatar-sm">
                                                        <img class="img-fluid avatar-img" src="assets/img/browser-logo/skype.png" alt="user">
                                                    </div>
                                                    <span class="ml-2 mb-0">Skype</span>
                                                </div>
                                                </td>
                                                <td>
                                                    <span>$248.47</span>
                                                </td>
                                                <td>2 month</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-horizontal"></i>
                                                        </a>
                                                        <div class="dropdown-menu custom-dropdown dropdown-menu-right p-3">
                                                            <h6 class="mb-1">Action</h6>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-file-alt pr-2"></i>View reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-edit pr-2"></i>Edit reports</a>
                                                            <a class="dropdown-item" href="#!"><i class="fa-fw far fa-chart-bar pr-2"></i>Statistics</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                        <div class="col-xl-5">
                            <div class="vectormap-wrapper">
                                <div id="world" class="vmap"></div>
                            </div>
                            <div class="text-right">
                                <h6 class="mb-0">Last updated</h6>
                                <span><b>2 hours</b> ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-4 mb-3">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-heading">
                        <h5 class="card-title">Last transaction</h5>
                    </div>
                    <div class="dropdown">
                        <select class="custom-select custom-select-sm" id="inputGroupSelect02">
                            <option selected>Weekly</option>
                            <option value="1">Monthly</option>
                            <option value="2">Yearly</option>
                            <option value="3">All time</option>
                        </select>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-self-center">
                        <div class="apexchart-wrapper col-sm text-center">
                            <div class="d-inline-block">
                                <div id="cardealerdemo4" class="jobportaldemo2"></div>
                            </div>
                            <h4 class="mt-2">Reached 6454</h4>
                            <p>Do it today. Remind yourself of someone you.</p>
                        </div>
                        <div class="col-sm">
                            <div class="mt-2">
                                <div class="mb-3">
                                    <h6 class="mb-1">Request more info: <span class="font-weight-bold pl-3">60%</span></h6>
                                    <div class="progress progress-sm mb-0" style="height: 6px;">
                                        <div role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;" class="progress-bar bg-primary"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Make an offer: <span class="font-weight-bold pl-3">40%</span></h6>
                                    <div class="progress progress-sm mb-0" style="height: 6px;">
                                        <div role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;" class="progress-bar bg-orange"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Schedule test drive: <span class="font-weight-bold pl-3">25%</span></h6>
                                    <div class="progress progress-sm mb-0" style="height: 6px;">
                                        <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;" class="progress-bar bg-cyan"></div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <h6 class="mb-1">Financial information: <span class="font-weight-bold pl-3">15%</span></h6>
                                    <div class="progress progress-sm mb-0" style="height: 6px;">
                                        <div role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width: 15%;" class="progress-bar bg-success"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <span class="bg-light py-1 px-3 border-radius d-inline-block">You have done 57.6% more sales today.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h5 class="card-title">New Projects</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="max-h-600 scrollbar scroll_dark" style="height: 500px" >
                                <div class="table-responsive">
                                    <table id="datatable-buttons" class="table mb-0 table-borderless table-border-3">
                                        <thead>
                                            <tr>
                                                <th>Project Name </th>
                                                <th> Start Date </th>
                                                <th> Due Date </th>
                                                <th>Team </th>
                                                <th>Status</th>
                                                <th>Clients</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>AD</span>
                                                        </div>
                                                        <span class="ml-2">App Design and development</span>
                                                    </div>
                                                </td>
                                                <td>Dec 03, 2020 </td>
                                                <td>Dec 25, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/01.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/02.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/03.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Sandradro Garett" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/04.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar avatar-more">
                                                            <a class="tooltip-wrapper avatar-text rounded-circle bg-primary text-white" data-toggle="tooltip" data-placement="top" title="View all" href="#"><span>12+</span> </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-info-inverse">On Hold</label></td>
                                                <td>Paul Flavius</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-pink mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>CD</span>
                                                        </div>
                                                        <span class="ml-2">Coffee Detail page - main page</span>
                                                    </div>
                                                </td>
                                                <td>Jan 12, 2020 </td>
                                                <td>Feb 22, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/05.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/06.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/07.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar avatar-more">
                                                            <a class="tooltip-wrapper avatar-text rounded-circle bg-primary text-white" data-toggle="tooltip" data-placement="top" title="View all" href="#"><span>10+</span> </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-danger-inverse">Pending</label></td>
                                                <td>Michael Bean</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-success mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>PI</span>
                                                        </div>
                                                        <span class="ml-2">Poster illustrator Design</span>
                                                    </div>
                                                </td>
                                                <td>Feb 12, 2020 </td>
                                                <td>Mar 25, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/09.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/03.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/01.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Sara Lisbon" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/02.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar avatar-more">
                                                            <a class="tooltip-wrapper avatar-text rounded-circle bg-primary text-white" data-toggle="tooltip" data-placement="top" title="View all" href="#"><span>5+</span> </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-primary-inverse">Working</label></td>
                                                <td>Mellissa Doe</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-orange mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>DB</span>
                                                        </div>
                                                        <span class="ml-2">Drinking Bottel Design </span>
                                                    </div>
                                                </td>
                                                <td>Apr 30, 2020 </td>
                                                <td>Apr 25, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/03.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/04.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/05.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Sara Lisbon" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/06.jpg" alt="user"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-success-inverse">Completed</label></td>
                                                <td>Felica Queen</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-danger mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>DA</span>
                                                        </div>
                                                        <span class="ml-2">Design and development</span>
                                                    </div>
                                                </td>
                                                <td>May 04, 2020 </td>
                                                <td>Jun 06, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/07.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/08.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/09.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar avatar-more">
                                                            <a class="tooltip-wrapper avatar-text rounded-circle bg-primary text-white" data-toggle="tooltip" data-placement="top" title="View all" href="#"><span>5+</span> </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-success-inverse">Completed</label></td>
                                                <td>Karla George</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-info mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>LP</span>
                                                        </div>
                                                        <span class="ml-2">Landing page Design - Home</span>
                                                    </div>
                                                </td>
                                                <td>Jul 12, 2020 </td>
                                                <td>Jul 26, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/03.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/04.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/05.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Sara Lisbon" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/06.jpg" alt="user"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-primary-inverse">Working</label></td>
                                                <td>Aaron Sharp</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type bg-pink mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>AD</span>
                                                        </div>
                                                        <span class="ml-2">App Design and development </span>
                                                    </div>
                                                </td>
                                                <td>Aug 04, 2020 </td>
                                                <td>Aug 23, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/07.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/08.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/05.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar avatar-more">
                                                            <a class="tooltip-wrapper avatar-text rounded-circle bg-primary text-white" data-toggle="tooltip" data-placement="top" title="View all" href="#"><span>6+</span> </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-info-inverse">On Hold</label></td>
                                                <td>Homer Reyes</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-type mb-1 mb-sm-0 mt-sm-0 mt-1">
                                                            <span>CD</span>
                                                        </div>
                                                        <span class="ml-2">Coffee Detail page - main page</span>
                                                    </div>
                                                </td>
                                                <td>Dec 05, 2020 </td>
                                                <td>Dec 25, 2020 </td>
                                                <td class="pl-4">
                                                    <div class="avatar-group">
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Brian" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/06.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Kirk Singleton" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/02.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Adrian Demiandro" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/07.jpg" alt="user"></a>
                                                        </div>
                                                        <div class="avatar">
                                                            <a class="tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="Sara Lisbon" href="#"> <img class="img-fluid rounded-circle" src="assets/img/avatar/08.jpg" alt="user"></a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><label class="badge badge-primary-inverse">Working</label></td>
                                                <td>Ora Bryan</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->
<!-- event Modal -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="verticalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalCenterTitle">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="modelemail">Event Name</label>
                        <input type="email" class="form-control" id="modelemail">
                    </div>
                    <div class="form-group">
                        <label>Choose Event Color</label>
                        <select class="form-control">
                            <option>Primary</option>
                            <option>Warning</option>
                            <option>Success</option>
                            <option>Danger</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
