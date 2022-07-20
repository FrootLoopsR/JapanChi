<?php

//Stand alone db insert for initial product state
$servername = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
else{
    echo "Connected successfully";
}
$products = array(
    array(
        "productCategory" => "Starter",
        "productName" => "Kimchi",
        "productCost" => "19",
        "productImage" => "assets/img/japan-menu/kimchi.jpeg",
        "productDescription" => "Cabbage, carrots, cucumbers, peppers and radishes, garnished with toasted sesame seeds.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Starter",
        "productName" => "Chicken gyoza",
        "productCost" => "31",
        "productImage" => "assets/img/japan-menu/chicken-gyoza.jpeg",
        "productDescription" => "Five dumplings stuffed with chicken and vegetables. Served with soy sauce and ginger.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Starter",
        "productName" => "Chicken Wings",
        "productCost" => "21",
        "productImage" => "assets/img/japan-menu/chicken-wings.jpeg",
        "productDescription" => "Crispy wings in tamarind and sesame garnish (8 units).",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Starter",
        "productName" => "Steamed rice",
        "productCost" => "12",
        "productImage" => "assets/img/japan-menu/steamed-rice.jpeg",
        "productDescription" => "",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Sushi",
        "productName" => "Fish Maki",
        "productCost" => "25",
        "productImage" => "assets/img/japan-menu/fish-maki.jpeg",
        "productDescription" => "A thin roll wrapped in nori seaweed, divided into 6 units. One fish to choose from.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Sushi",
        "productName" => "Fish Maki I/O",
        "productCost" => "27",
        "productImage" => "assets/img/japan-menu/fish-maki-io.jpeg",
        "productDescription" => "A thin roll wrapped in nori seaweed, divided into 6 units. One fish and one vegetable to choose from.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Sushi",
        "productName" => "Photomaki",
        "productCost" => "32",
        "productImage" => "assets/img/japan-menu/photomaki.jpeg",
        "productDescription" => "Thick roll wrapped in nori seaweed, divided into 8/4 units. To choose from fish and two vegetables / three vegetables.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Sushi",
        "productName" => "Photomaki I/O",
        "productCost" => "37",
        "productImage" => "assets/img/japan-menu/photomaki-io.jpeg",
        "productDescription" => "To choose from fish and two vegetables / three vegetables.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Wok",
        "productName" => "Chiang Mai chicken",
        "productCost" => "54",
        "productImage" => "assets/img/japan-menu/chiang-mai-chicken.jpeg",
        "productDescription" => "Udon noodles sautéed in red curry and coconut milk with champignon mushrooms, peppers, green onions and garnish with coriander and roasted peanuts.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Wok",
        "productName" => "Chiang Mai beef",
        "productCost" => "57",
        "productImage" => "assets/img/japan-menu/chiang-mai-beef.jpeg",
        "productDescription" => "Udon noodles sautéed in red curry and coconut milk with champignon mushrooms, peppers, green onions and garnish with coriander and roasted peanuts.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Wok",
        "productName" => "Chicken pad Thai",
        "productCost" => "49",
        "productImage" => "assets/img/japan-menu/chicken-pad-thai.jpeg",
        "productDescription" => "",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Wok",
        "productName" => "Beef pad Thai",
        "productCost" => "52",
        "productImage" => "assets/img/japan-menu/beef-pad-thai.jpeg",
        "productDescription" => "Stir-fried rice noodles in chili and sweet soy with egg, cabbage, carrots, sprouts and scallions and garnish with a slice of lemon, coriander and roasted peanuts.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Special",
        "productName" => "White Royal",
        "productCost" => "54",
        "productImage" => "assets/img/japan-menu/white-royal.jpeg",
        "productDescription" => "Tuna, avocado, tobiko and cream cheese in a Dennis coating, chopped chives and dots of spicy mayonnaise",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Special",
        "productName" => "Crispy roll",
        "productCost" => "49",
        "productImage" => "assets/img/japan-menu/crispy-roll.jpeg",
        "productDescription" => "Spicy salmon / salmon tempura (optional), avocado and sweet potato topped with grilled salmon, sweet potato chips, fennel and scallions.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Special",
        "productName" => "Sunset",
        "productCost" => "44",
        "productImage" => "assets/img/japan-menu/sunset.jpeg",
        "productDescription" => "Salmon in tempura, avocado, cucumber and chives in sweet potato coating.",
        "dateCreated" => date('Y-m-d'),
    ),
    array(
        "productCategory" => "Special",
        "productName" => "Umami",
        "productCost" => "49",
        "productImage" => "assets/img/japan-menu/umami.jpeg",
        "productDescription" => "Spicy tuna, sweet potato in tempura, cucumber, chives and asparagus in a tuna and avocado coating.",
        "dateCreated" => date('Y-m-d'),
    ),
);

foreach ($products as $product) {
    $sql = "INSERT INTO products (productCategory, productName, productCost, productImage, productDescription, dateCreated) VALUES('{$product['productCategory']}', '{$product['productName']}', {$product['productCost']}, '{$product['productImage']}', '{$product['productDescription']}', '{$product['dateCreated']}')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }


}
$con->close();
