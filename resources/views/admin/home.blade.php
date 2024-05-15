@extends('layouts.themes.main')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-left">
                    <li><h3>Home</h3></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section id="dashboard">
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-8">
                    <h5><i class="fa fa-bullhorn"></i> Announcements</h5>
                    @if(Session::has('user_fname') && Session::get('user')->user_role == 1)
                        <a class="btn btn-primary btn-round float-right mb-3" href="javascript:void(0)" data-toggle="modal" data-target="#newAnnouncementModal" style="border-radius: 12px;"><i class="fa fa-comment"></i> Compose</a>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        @foreach($announcements as $announcement)
                        <div class="timeline-icon mt-3 ml-2">
                            <i class="fa fa-newspaper-o"></i>
                            <div class="timeline-line"></div>
                        </div>
                        <div class="container">
                            <div class="timeline-card col-lg-11 ml-4">
                                <div class="timeline-content mt-3">
                                    <div class="timeline-header">
                                        <span class="time">
                                            <i class="fa fa-clock-o"></i>
                                            {{ \Carbon\Carbon::parse($announcement->ann_posted_date)->diffForHumans(null, true) }}
                                        </span>
                                        <h3 class="timeline-title"><i class="fa fa-bookmark-o"></i> {{ $announcement->ann_title }}</h3>
                                    </div>
                                    <div class="timeline-body">
                                        <p>{{ $announcement->ann_content }}</p>
                                    </div>
                                </div>
                                <div class="timeline-footer">
                                    @if(Session::has('user_fname') && Session::get('user')->user_role == 1)
                                    <a class="btn btn-danger btn-sm" href="{{ route('delete_announcements', ['ann_id' => $announcement->ann_id]) }}" style="border-radius: 8px;">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header bg-secondary">
                            <h4 class="card-title text-white"><i class="fa fa-history"></i> Recent Users</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="newAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Annoucement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('announcements.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="ann_title">Title <span style="color:red;">*</span></label>
                        <input type="text" class="form-control" id="ann_title" name="ann_title" placeholder="Title" required/>
                    </div>
                    <div class="form-group">
                        <label for="ann_content">Announcement Content <span style="color:red;">*</span></label>
                        <textarea class="form-control" id="ann_content" name="ann_content" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><span class="fa fa-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
