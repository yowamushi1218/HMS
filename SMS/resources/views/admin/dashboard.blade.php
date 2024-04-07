@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><h3>Dashboard</h3></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="dashboard">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Bar chart </h4>
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Doughnut Chart </h4>
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">Pie Chart </h4>
                            <canvas id="pieChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
