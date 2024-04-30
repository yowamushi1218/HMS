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
    <section id="profile">
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="container-xl px-4 mt-4">
                                    {{-- <nav class="nav nav-borders">
                                        <a class="nav-link active ms-0" href="#" data-target="profile-section">Profile</a>
                                        {{-- <a class="nav-link" href="#" data-target="security-section">Security</a>
                                        <a class="nav-link" href="#" data-target="notif-section">Notifications</a>
                                    </nav>
                                    <hr class="mt-0 mb-4"> --}}
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
                                                        {{-- <div class="row gx-3 mb-3">
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputFirstName">First name</label>
                                                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputLastName">Last name</label>
                                                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name">
                                                            </div>
                                                        </div>
                                                        <div class="row gx-3 mb-3">
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputOrgName">Organization name</label>
                                                                <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputLocation">Location</label>
                                                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your location">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address">
                                                        </div>
                                                        <div class="row gx-3 mb-3">
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                                                <input class="form-control mb-3" id="inputBirthday" type="text" name="birthday" placeholder="Enter your birthday">
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-1 mb-2">Username and Password</h4> --}}
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
                            {{-- <div class="container-xl px-4 mt-4">
                                <div class="row row-content" id="security-section" style="display:none;">
                                    <div class="col-lg-8">
                                        <div class="card mb-4">
                                            <div class="card-header">Change Password</div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="currentPassword">Current Password</label>
                                                        <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="newPassword">New Password</label>
                                                        <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                                        <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                                                    </div>
                                                    <button class="btn btn-primary" type="button">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <div class="card-header">Security Preferences</div>
                                            <div class="card-body">
                                                <h5 class="mb-1">Account Privacy</h5>
                                                <p class="small text-muted">By setting your account to private, your profile information and posts will not be visible to users outside of your user groups.</p>
                                                <form>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy" checked="">
                                                        <label class="form-check-label" for="radioPrivacy1">Public (posts are available to all users)</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy">
                                                        <label class="form-check-label" for="radioPrivacy2">Private (posts are available to only users in your groups)</label>
                                                    </div>
                                                </form>
                                                <hr class="my-4">
                                                <h5 class="mb-1">Data Sharing</h5>
                                                <p class="small text-muted">Sharing usage data can help us to improve our products and better serve our users as they navigation through our application. When you agree to share usage data with us, crash reports and usage analytics will be automatically sent to our development team for investigation.</p>
                                                <form>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage" checked="">
                                                        <label class="form-check-label" for="radioUsage1">Yes, share data and crash reports with app developers</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage">
                                                        <label class="form-check-label" for="radioUsage2">No, limit my data sharing with app developers</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card mb-4">
                                            <div class="card-header">Two-Factor Authentication</div>
                                            <div class="card-body">
                                                <p>Add another level of security to your account by enabling two-factor authentication. We will send you a text message to verify your login attempts on unrecognized devices and browsers.</p>
                                                <form>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="">
                                                        <label class="form-check-label" for="twoFactorOn">On</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                                                        <label class="form-check-label" for="twoFactorOff">Off</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                                        <input class="form-control" id="twoFactorSMS" type="tel" placeholder="Enter a phone number" value="555-123-4567">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card mb-4">
                                            <div class="card-header">Delete Account</div>
                                            <div class="card-body">
                                                <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.</p>
                                                <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container-xl px-4 mt-4">
                                <div class="row row-content" id="notif-section" style="display:none;">
                                    <div class="col-lg-8">
                                        <div class="card card-header-actions mb-4">
                                            <div class="card-header">
                                                Email Notifications
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="">
                                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputNotificationEmail">Default notification email</label>
                                                        <input class="form-control" id="inputNotificationEmail" type="email" value="name@example.com" disabled="">
                                                    </div>
                                                    <div class="mb-0">
                                                        <label class="small mb-2">Choose which types of email updates you receive</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkAccountChanges" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkAccountChanges">Changes made to your account</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkAccountGroups" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkAccountGroups">Changes are made to groups you're part of</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkProductUpdates" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkProductUpdates">Product updates for products you've purchased or starred</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkProductNew" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkProductNew">Information on new products and services</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkPromotional" type="checkbox">
                                                            <label class="form-check-label" for="checkPromotional">Marketing and promotional offers</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="checkSecurity" type="checkbox" checked="" disabled="">
                                                            <label class="form-check-label" for="checkSecurity">Security alerts</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card card-header-actions mb-4">
                                            <div class="card-header">
                                                Push Notifications
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" id="smsToggleSwitch" type="checkbox" checked="">
                                                    <label class="form-check-label" for="smsToggleSwitch"></label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputNotificationSms">Default SMS number</label>
                                                        <input class="form-control" id="inputNotificationSms" type="tel" value="123-456-7890" disabled="">
                                                    </div>
                                                    <div class="mb-0">
                                                        <label class="small mb-2">Choose which types of push notifications you receive</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkSmsComment" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkSmsComment">Someone comments on your post</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkSmsShare" type="checkbox">
                                                            <label class="form-check-label" for="checkSmsShare">Someone shares your post</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkSmsFollow" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkSmsFollow">A user follows your account</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" id="checkSmsGroup" type="checkbox">
                                                            <label class="form-check-label" for="checkSmsGroup">New posts are made in groups you're part of</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" id="checkSmsPrivateMessage" type="checkbox" checked="">
                                                            <label class="form-check-label" for="checkSmsPrivateMessage">You receive a private message</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-header">Notification Preferences</div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="form-check mb-2">
                                                        <input class="form-check-input" id="checkAutoGroup" type="checkbox" checked="">
                                                        <label class="form-check-label" for="checkAutoGroup">Automatically subscribe to group notifications</label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" id="checkAutoProduct" type="checkbox">
                                                        <label class="form-check-label" for="checkAutoProduct">Automatically subscribe to new product notifications</label>
                                                    </div>
                                                    <button class="btn btn-danger-soft text-danger">Unsubscribe from all notifications</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
