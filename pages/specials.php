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

        async function showRelevantProducts() {
            const products = await getDataFromDB();
            const filteredProducts = products.filter(product => product['productCategory'] === "Special");
            const specialDish = document.getElementById('special-dish-contect');
            const specialLinksDiv = document.getElementById('special-links');
            let tabCounter = 1;
            filteredProducts.forEach(special => {
                const activeClass = (tabCounter === 1) ? ' active show' : '';
                specialLinksDiv.innerHTML += `
                <li class="nav-item">
                        <a class="nav-link${activeClass}" data-bs-toggle="tab" href="#tab-${tabCounter}">${special['productName']}</a>
                    </li>`
                specialDish.innerHTML += `
                <div class="tab-pane${activeClass}" id="tab-${tabCounter}">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>${special['productName']}</h3>
                                <p>${special['productDescription']}</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="${special['productImage']}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                `;
                tabCounter++;
            });
        }

        $(document).ready(function () {
            showRelevantProducts();
        });
    </script>


</header>
<body>

<!-- ======= Specials Section ======= -->
<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Specials</h2>
            <p>Check Our Specials</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-3">
                <ul id="special-links" class="nav nav-tabs flex-column">
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div id="special-dish-contect" class="tab-content">
                </div>
            </div>
        </div>

    </div>

</section>
<!-- End Specials Section -->
</body>
</html>