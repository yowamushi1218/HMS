@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><h3>User's Home</h3></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="dashboard">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <i class="fa fa-id-card-o" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalUsers }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Employee's Available</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <i class="fa fa-calendar" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalAppointments }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Appointments Today</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <i class="fa fa-user-md" style='font-size:70px; color: #ffffff;'></i>
                            <span class="ml-5 text-white" style="font-size: 50px;">{{ $totalClients }}</span>
                            <p style="font-size: 14px; color:#ffffff">Total Overall Clients</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div id='calendar'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="max-width: 600; margin: 0 auto;">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Client</th>
                                            <th>Employee</th>
                                            <th>Reason's</th>
                                            <th>Services</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($appointments as $index => $sched)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $sched->app_name }}</td>
                                                <td>{{ $sched->app_user }}</td>
                                                <td>{{ $sched->app_reason }}</td>
                                                <td>{{ $sched->app_services }}</td>
                                                <td>{{ \Carbon\Carbon::parse($sched->app_endAt)->format('F d, Y H:i') }}</td>
                                                <td>
                                                    @if($sched->app_active == '1')
                                                        <span class="badge badge-warning"><i class="fa fa-refresh"></i> Pending</span>
                                                    @elseif($sched->app_active == '-1')
                                                        <span class="badge badge-primary"><i class="fa fa-check-square-o"></i> Complete</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-info" style="font-size: 13px; color: #fff;" data-toggle="modal" data-target="#ViewRecordsModal{{ $sched->app_id }}"><i class="fa fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Sample Data',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [10, 20, 30, 40, 50, 60, 70]
            }]
        };
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };
        var ctx = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>
@endsection
