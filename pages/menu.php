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