<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" type="text/css">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

    <script>
        async function getReviewsFromDB() {
            try {
                const response = await fetch('forms/get-reviews-from-db.php');
                return JSON.parse(await response.json());
            } catch (error) {
                console.log(error);
            }
        }

        async function assembleReviews() {
            const reviews = await getReviewsFromDB();
            const reviewDiv = document.getElementById('review-container');
            reviewDiv.innerHTML += '';
            reviews.forEach(review => {
                reviewDiv.innerHTML += `
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            ${review['message']}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <h3>${review['name']}</h3>
                        <h4>${review['title']}</h4>
                    </div>
                </div>
                `
            });
        }

        assembleReviews();
    </script>
</head>
<body>

<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Testimonials</h2>
            <p>What they're saying about us</p>
        </div>

        <div class="row testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div id="review-container" class="swiper-wrapper">

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Testimonials Section -->
<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<!-- End Footer -->
</body>
</html>