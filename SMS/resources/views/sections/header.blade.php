<nav class="header sticky-top navbar-light bg-body-tertiary">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="logo" href="#">
            <img src="{{ asset('assets/logo/logo-brand.png') }}" alt="Logo">
        </a>
        <div class="header-right d-none d-md-flex">
            <a class="nav-link active" href="#">HOME</a>
            <a class="nav-link" href="#">ABOUT</a>
            <a class="nav-link" href="#">PROJECTS</a>
            <a class="nav-link" href="#">RESUME</a>
            <a class="nav-link" href="#">SERVICES</a>
            <a class="nav-link" href="#">CONTACT</a>
        </div>
        <div class="burger-icon d-md-none" onclick="toggleMenu()">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </div>
</nav>
<div class="dropdown-content">
    <a class="active" href="#">HOME</a>
    <a href="#">ABOUT</a>
    <a href="#">PROJECTS</a>
    <a href="#">RESUME</a>
    <a href="#">SERVICES</a>
    <a href="#">CONTACT</a>
</div>

<script>
function toggleMenu() {
    var dropdownContent = document.querySelector('.dropdown-content');
    var burgerIcon = document.querySelector('.burger-icon');
    dropdownContent.classList.toggle('open');
    burgerIcon.classList.toggle('open');
}
</script>
