@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5 text-light">Dashboard</h1>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card bg-dark border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Entities
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-light">{{ $entities }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-building fa-2x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card bg-dark border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Transactions
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-light">{{ $transactions }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card bg-dark border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Categories
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-light">{{ $categories }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                 style="width: {{ ($categories > 0 ? min(($categories / 10) * 100, 100) : 0) }}%" aria-valuenow="{{ $categories }}" aria-valuemin="0"
                                                 aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-list fa-2x text-gray-600"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional: Add more sections for charts, recent transactions, etc. -->
    </div>
@endsection
