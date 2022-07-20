<!DOCTYPE html>
<html lang="en">
<head>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>
<body>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Us</p>
        </div>
    </div>

    <div data-aos="fade-up">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3370.8591139826513!2d34.91013021536006!3d32.342491581105435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d16a555555555%3A0xeef2b9c4fa52e717!2sRuppin%20Academic%20Center!5e0!3m2!1sen!2sil!4v1656282712685!5m2!1sen!2sil"
                width="100%" height="350" style="border:0;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container" data-aos="fade-up">
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Ruppin Academic Center </br>Computer Engineering Department</p>
                    </div>

                    <div class="open-hours">
                        <i class="bi bi-clock"></i>
                        <h4>Open Hours:</h4>
                        <p>
                            Monday-Saturday:<br>
                            11:00 AM - 2300 PM
                        </p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>info@japanchi.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>052-1234567</p>
                    </div>

                </div>

            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
                <form action="forms/contact-us.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                   required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                               required>
                    </div>
                    <div class="form-group mt-3">
                            <textarea class="form-control" name="message" id="message" rows="8" placeholder="Message"
                                      required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center">
                        <button type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Section -->

<!-- Vendor JS Files -->

<script src="assets/vendor/php-form/validate.js"></script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<!-- End Footer -->
</body>
</html>


