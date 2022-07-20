<!DOCTYPE html>
<html lang="en">
<header>
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
        function previewPost() {
            document.getElementById("testimonials").style.display = "flex";
            let message = document.getElementById("message").value;
            let name = document.getElementById("name").value;
            let title = document.getElementById("title").value;
            document.getElementById("preview-post").innerHTML = `
        <div class="row testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            ${message}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <h3>${name}</h3>
                        <h4>${title}</h4>
                    </div>
                </div>
            </div>
        </div>
            `
            document.getElementById("testimonials").scrollIntoView({behavior: 'smooth'});
        }
    </script>

</header>
<body>
<!-- ======= Post a Review Section ======= -->
<section id="book-a-table" class="book-a-table">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Review Submit</h2>
            <p>Post a Review</p>
        </div>

        <form action="forms/upload-review.php" method="post" role="form" class="php-email-form"
              data-aos="fade-up"
              data-aos-delay="100">
            <div class="row">
                <div class="col-lg-6 col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                           data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                    <div class="validate"></div>
                </div>
                <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="title" id="title" placeholder="Your Title"
                           data-rule="minlen:4" data-msg="Please enter at least 4 chars" required>
                    <div class="validate"></div>
                </div>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Message"
                          data-rule="minlen:10"
                          required></textarea>
                <div class="validate"></div>
            </div>
            <section id="testimonials" class="testimonials section-sm mb-2" style="display: none">
                <div id="preview-post" class="container" data-aos="fade-up">

                </div>
            </section>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your review was sent. You can see it in <a
                            href="javascript:loadPage('testimonials', true)">Reviews Page</a> Thank you!
                </div>
            </div>
            <div class="text-center">
                <button type="button" onclick="previewPost()">Preview</button>
                <button type="submit">Post a Review</button>
            </div>
        </form>
    </div>
</section><!-- End Post a Review Section -->
<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>