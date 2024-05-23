@extends('layouts.themes.main')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-3 text-dark">Compose Message</h1>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="col-md-9">
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Send Message</h3>
                        </div>
                        <form method="POST" action="{{ route('send.sms') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="msg_subject">Recipients <span style="color:red;">*</span></label>
                                    <select class="select form-control" data-placeholder="Select recipients" name="app_phone" required>
                                        <option value="" disabled selected>Select recipients</option>
                                        @foreach($appointments as $sched)
                                            <option value="{{ $sched->app_phone }}">{{ $sched->full_name }}, {{ $sched->app_phone }}</option>
                                        @endforeach
                                    </select>
                                    @error('app_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-envelope"></i> Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
