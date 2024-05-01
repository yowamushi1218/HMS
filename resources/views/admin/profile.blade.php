@extends('layouts.themes.main')
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <ol class="breadcrumb text-left">
                        <li><h3>My Profile</h3></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-body">
                <div class="container-xl px-4 mt-4">
                    <div class="row row-content" id="profile-section">
                        <div class="col-xl-4">
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header">Profile Picture</div>
                                <div class="card-body text-center">
                                    @if(session('user_images'))
                                        <img src="{{ asset('assets/images/' . session('user_images')) }}" class="user-avatar rounded-circle w-50 h-50" alt="User Image">
                                    @else
                                        <img src="{{ asset('assets/images/default.png') }}" class="user-avatar rounded-circle" alt="User Image">
                                    @endif
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <button class="btn btn-primary" type="file" data-toggle="modal" data-target="#uploadImageModal">Upload new image</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            <div class="card mb-2">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">
                                    <form>
                                        <hr class="mt-0">
                                        <div class="row gx-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="small mb-1" for="inputUsername">Username or Email</label>
                                                <input class="form-control" name="email" type="text" value="{{ session('email') }}" placeholder="Enter your username" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                                <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="newPassword">New Password</label>
                                                <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-3" type="button">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="uploadImageModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Upload Photo</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form method="POST" action="{{ route('updateInfo') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <p class="mb-3">Please upload your profile picture</p>
                                    <input type="file" id="user_images" name="user_images" accept="image/*">
                                    <div class="small font-italic text-muted mt-2">JPG or PNG no larger than 5 MB</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    navLinks.forEach(function(navLink) {
                        navLink.classList.remove('active');
                    });
                    this.classList.add('active');
                    var target = this.getAttribute('data-target');
                    var sections = document.querySelectorAll('.row-content');
                    sections.forEach(function(section) {
                        section.style.display = 'none';
                    });
                    var targetSection = document.getElementById(target);
                    if (targetSection) {
                        targetSection.style.display = 'block';
                    } else {
                        console.error('Section not found:', target);
                    }
                });
            });
        });
    </script>
@endsection
