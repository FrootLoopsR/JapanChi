<!DOCTYPE html>
<html lang="en">
<header>
    <script>

        //on nav bar click, load the page into the main section
        //manipulation of dom to create "one page application"
        function loadPage(page, redirect=false) {
            if(document.getElementById(page) && !redirect)
                return;

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
            <li><a class="nav-link" href="javascript:loadPage('contact')">Contact Us</a></li>
            <li><a class="nav-link" href="javascript:loadPage('testimonials')">Reviews</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    <a href="javascript:loadPage('post-review')" class="post-a-review-btn scrollto d-none d-lg-flex">Post a Review</a>
</div>
</body>
<!-- End Header -->

