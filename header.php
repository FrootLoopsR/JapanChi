<!DOCTYPE html>
<html lang="en">
<header>
    <script>
        function loadPage(page) {
            $("#main").load(`pages/${page}.php`);
            document.body.scrollTop = 0; //safari
            document.documentElement.scrollTop = 0; //chrome, firefox, IE
        }
    </script>
</header>
<body>

<!-- ======= Header ======= -->
<div class="container-fluid container-xl d-flex align-items-center justify-content-lg-around">
    <h1 class="logo">
        <a href="index.php">
            <img src="assets/img/JapanLogo-No-BG.png" alt="Logo">
        </a>
    </h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link" href="javascript:loadPage('welcome')">Home</a></li>
            <li><a class="nav-link" href="javascript:loadPage('about')">About</a></li>
            <li><a class="nav-link" href="javascript:loadPage('menu')">Menu</a></li>
            <li><a class="nav-link" href="javascript:loadPage('specials')">Specials</a></li>
            <li><a class="nav-link" href="javascript:loadPage('gallery')">Gallery</a></li>
            <li><a class="nav-link" href="javascript:loadPage('contact-us')">Contact Us</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <a href="#book-a-table" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>
</div>
</body>
<!-- End Header -->

