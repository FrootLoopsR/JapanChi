<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="utf-8">

    <script>
        async function getDataFromDB() {
            try {
                const response = await fetch('getProductsFromDB.php');
                return JSON.parse(await response.json());
            } catch (error) {
                console.log(error);
            }
        }

        async function showRelevantProducts(productType) {
            const products = await getDataFromDB();
            console.log(products);
            const filteredProducts = productType === 'All' ? products : products.filter(product => product['productCategory'] === productType);
            console.log(filteredProducts);
            const productDiv = document.getElementById('menu-items');
            productDiv.innerHTML = '';
            filteredProducts.forEach(product => {
                productDiv.innerHTML += `
                    <div class="col-lg-6 menu-item">
                        <img src=${product['productImage']} class="menu-img" alt=${product['productName']}>
                        <div class="menu-content">
                            <span>${product['productName']}</span><span>${product['productCost']}&#8362;</span>
                        </div>
                        <div class="menu-ingredients">
                            ${product['productDescription']}
                        </div>
                    </div>
                `;
            });
            document.getElementById("menu-flters").childNodes.forEach(node => {
                node.className = '';
            });
            document.getElementById(`${productType}`).classList.toggle('filter-active');

        }

        showRelevantProducts('All');

    </script>

</header>
<body>
<!-- ======= Menu Section ======= -->
<section id="menu" class="menu section-bg">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Menu</h2>
            <p>Check Our Tasty Menu</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="menu-flters">
                    <li id="All" class="filter-active" onclick="showRelevantProducts('All')">All</li>
                    <li id="Starter" onclick="showRelevantProducts('Starter')">Starters</li>
                    <li id="Sushi" onclick="showRelevantProducts('Sushi')"> Sushi</li>
                    <li id="Wok" onclick="showRelevantProducts('Wok')">Wok</li>
                    <li id="Special" onclick="showRelevantProducts('Special')">Specials</li>
                </ul>
            </div>
        </div>
        <div id="menu-items" class="row menu-container" data-aos="fade-up" data-aos-delay="200">

        </div>
</section>
<!-- End Menu Section -->


<!--<section id="menu" class="menu section-bg">-->
<!--    <div class="container" data-aos="fade-up">-->
<!---->
<!--        <div class="section-title">-->
<!--            <h2>Menu</h2>-->
<!--            <p>Check Our Tasty Menu</p>-->
<!--        </div>-->
<!---->
<!--        <div class="row" data-aos="fade-up" data-aos-delay="100">-->
<!--            <div class="col-lg-12 d-flex justify-content-center">-->
<!--                <ul id="menu-flters">-->
<!--                    <li data-filter="*" class="filter-active">All</li>-->
<!--                    <li data-filter=".filter-starters">Starters</li>-->
<!--                    <li data-filter=".filter-salads">Sushi</li>-->
<!--                    <li data-filter=".filter-specialty">Specialty</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-starters">-->
<!--                <img src="assets/img/menu/lobster-bisque.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Lobster Bisque</a><span>$5.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Lorem, deren, trataro, filede, nerada-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-specialty">-->
<!--                <img src="assets/img/menu/bread-barrel.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Bread Barrel</a><span>$6.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Lorem, deren, trataro, filede, nerada-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-starters">-->
<!--                <img src="assets/img/menu/cake.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Crab Cake</a><span>$7.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    A delicate crab cake served on a toasted roll with lettuce and tartar sauce-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-salads">-->
<!--                <img src="assets/img/menu/caesar.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Caesar Selections</a><span>$8.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Lorem, deren, trataro, filede, nerada-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-specialty">-->
<!--                <img src="assets/img/menu/tuscan-grilled.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Tuscan Grilled</a><span>$9.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Grilled chicken with provolone, artichoke hearts, and roasted red pesto-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-starters">-->
<!--                <img src="assets/img/menu/mozzarella.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Mozzarella Stick</a><span>$4.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Lorem, deren, trataro, filede, nerada-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-salads">-->
<!--                <img src="assets/img/menu/greek-salad.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Greek Salad</a><span>$9.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Fresh spinach, crisp romaine, tomatoes, and Greek olives-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-salads">-->
<!--                <img src="assets/img/menu/spinach-salad.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Spinach Salad</a><span>$9.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 menu-item filter-specialty">-->
<!--                <img src="assets/img/menu/lobster-roll.jpg" class="menu-img" alt="">-->
<!--                <div class="menu-content">-->
<!--                    <a href="#">Lobster Roll</a><span>$12.95</span>-->
<!--                </div>-->
<!--                <div class="menu-ingredients">-->
<!--                    Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</section>-->

<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>


<!-- End Menu Section -->

</body>
</html>