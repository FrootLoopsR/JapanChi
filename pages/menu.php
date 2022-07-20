<!DOCTYPE html>
<html lang="en">
<header>
    <meta charset="utf-8">

    <script>
        async function getProductsFromDB() {
            try {
                const response = await fetch('forms/get-products-from-db.php');
                return JSON.parse(await response.json());
            } catch (error) {
                console.error("ERROR OCC:" + error);
                return "None";
            }
        }

        async function showRelevantProducts(productType) {
            try {
                const products = await getProductsFromDB();
                console.log("products: ", products);
                const filteredProducts = productType === 'All' ? products : products.filter(product => product['productCategory'] === productType);
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
            } catch (error) {
                console.error("ERROR OCC:" + error);
            }
        }

        $(document).ready(function () {
            showRelevantProducts('All');
        });
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


</body>
</html>