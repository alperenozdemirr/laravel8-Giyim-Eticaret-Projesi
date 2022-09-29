@extends('backend.layout')
@section('title',"Admin")
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-xl-0">
                        <div class="d-lg-flex align-items-center">
                            <div>
                                <h3 class="text-dark font-weight-bold mb-2">Selam, Hoşgeldin Admin Paneline</h3>
                                <h6 class="font-weight-normal mb-2">7/24 senin için buradayım</h6>
                            </div>
                            <div class="ms-lg-5 d-lg-flex d-none">
                                <button type="button" class="btn bg-white btn-icon">
                                    <i class="mdi mdi-view-grid text-success"></i>
                                </button>
                                <button type="button" class="btn bg-white btn-icon ms-2">
                                    <i class="mdi mdi-format-list-bulleted font-weight-bold text-primary"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center justify-content-md-end">
                            <div class="pe-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Feedback
                                    <i class="mdi mdi-message-outline btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="pe-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Help
                                    <i class="mdi mdi-help-circle-outline btn-icon-append"></i>
                                </button>
                            </div>
                            <div class="pe-1 mb-3 mb-xl-0">
                                <button type="button" class="btn btn-outline-inverse-info btn-icon-text">
                                    Print
                                    <i class="mdi mdi-printer btn-icon-append"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-success font-weight-bold">18390</h2>
                                    <i class="mdi mdi-account-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="newClient"></canvas>
                            <div class="line-chart-row-title">MY NEW CLIENTS</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-danger font-weight-bold">839</h2>
                                    <i class="mdi mdi-refresh mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="allProducts"></canvas>
                            <div class="line-chart-row-title">All Products</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-info font-weight-bold">244</h2>
                                    <i class="mdi mdi-file-document-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="invoices"></canvas>
                            <div class="line-chart-row-title">NEW INVOICES</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-warning font-weight-bold">3259</h2>
                                    <i class="mdi mdi-folder-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="projects"></canvas>
                            <div class="line-chart-row-title">All PROJECTS</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-secondary font-weight-bold">586</h2>
                                    <i class="mdi mdi-cart-outline mdi-18px text-dark"></i>
                                </div>
                            </div>
                            <canvas id="orderRecieved"></canvas>
                            <div class="line-chart-row-title">Orders Received</div>
                        </div>
                    </div>
                    <div class="col-lg-2 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h2 class="text-dark font-weight-bold">7826</h2>
                                    <i class="mdi mdi-cash text-dark mdi-18px"></i>
                                </div>
                            </div>
                            <canvas id="transactions"></canvas>
                            <div class="line-chart-row-title">TRANSACTIONS</div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
@endsection
@section('css') @endsection
@section('js') @endsection
