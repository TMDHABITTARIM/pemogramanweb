<?php
require_once 'provider.php';
$data = fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANS COPY - Your Stationery Solution</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <h1>TRANS COPY</h1>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search products..." id="searchBar" onkeyup="filterProducts()">
                <button><span class="icon-search"></span></button>
            </div>
            <div class="nav-items">
                <a href="#home" class="nav-link">Home</a>
                <a href="#products" class="nav-link">Products</a>
                <a href="#about" class="nav-link">About</a>
                <a href="#contact" class="nav-link">Contact</a>
                <div class="cart-icon">
                    <span class="icon-cart"></span>
                    <span class="cart-count">0</span>
                </div>
            </div>
            <div class="mobile-menu">
                <span class="icon-menu"></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="hero-slider">
            <div class="slide active">
                <img src="https://images.unsplash.com/photo-1456735190827-d1262f71b8a3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80" alt="Stationery">
                <div class="slide-content">
                    <h2>Welcome to TRANS COPY</h2>
                    <p>Your One-Stop Stationery Shop</p>
                    <button class="cta-button">Shop Now</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="products">
        <h2 class="section-title">Available Products</h2>
        <div class="product-container" id="productGrid">
            <?php
            foreach ($data['data'] as $row) {
                
            ?>
            <div class="product-frame">
                <img class="product-image" src="<?php echo htmlspecialchars($row['gambar_product']); ?>" alt="<?php echo htmlspecialchars($row['nama_product']); ?>">
                <div class="product-details">
                    <h3 class="product-name"><?php echo htmlspecialchars($row['nama_product']); ?></h3>
                    <p class="product-price">Price: $<?php echo number_format($row['harga_product'], 2); ?></p>
                    <button class="product-button" onclick="addToCart('<?php echo htmlspecialchars($row['nama_product']); ?>', <?php echo $row['harga_product']; ?>)">Add to Cart</button>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer">
        <div class="footer-container">
            <p>&copy; 2024 TRANS COPY. All rights reserved.</p>
        </div>
    </footer>

    <script>
        let cart = [];

        function addToCart(name, price) {
            cart.push({ name, price });
            alert(`${name} has been added to the cart!`);
        }

        function filterProducts() {
            const input = document.getElementById('searchBar').value.toLowerCase();
            const products = document.getElementsByClassName('product-frame');
            Array.from(products).forEach(product => {
                const name = product.getElementsByClassName('product-name')[0].innerText.toLowerCase();
                product.style.display = name.includes(input) ? '' : 'none';
            });
        }
    </script>
</body>
</html>
