<script setup>
</script>

<template>
<body>
    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="container">
                <h1 class="hero-title">Welcome to TRANS COPY</h1>
                <p class="hero-text">Your one-stop shop for professional stationery supplies</p>
                <a href="#products" class="btn-primary">Shop Now</a>
            </div>
        </section>

        <!-- Products Section -->
        <section id="products" class="products-section">
            <div class="container">
                <h2 class="section-title">Our Products</h2>
                <div class="product-cards">
                    <!-- Product Cards -->
                    <div class="product-card">
                        <img src="https://www.action-mailing.com/wp-content/uploads/2020/01/large-poster-printing.jpg" alt="Percetakan">
                        <div class="product-card-content">
                            <h5>Percetakan</h5>
                            <p>Layanan cetak dokumen, kartu nama, brosur, dan poster dengan hasil berkualitas dan cepat.</p>
                            <a href="#" class="btn-primary">Order Now</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="https://c0.wallpaperflare.com/preview/908/848/961/pens-write-draw-paint.jpg" alt="Alat Tulis">
                        <div class="product-card-content">
                            <h5>Alat Tulis</h5>
                            <p>Menjual pulpen, pensil, penghapus, spidol, dan buku catatan dengan harga terjangkau.</p>
                            <a href="#" class="btn-primary">Order Now</a>
                        </div>
                    </div>
                    <div class="product-card">
                        <img src="https://media.istockphoto.com/id/1340404394/photo/businessmen-press-button-on-the-panel-for-using-photocopier-or-printer-for-printout-and.jpg?b=1&s=612x612&w=0&k=20&c=fyJe3h42Mx-Ep_iMLCnnwBDA7L3cBNo6zgYzLeb0UZg=" alt="Print/Fotocopy">
                        <div class="product-card-content">
                            <h5>Print/Fotocopy</h5>
                            <p>Print dan fotocopy hitam putih atau warna, cepat dan murah, untuk berbagai kebutuhan.</p>
                            <a href="#" class="btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="about-section">
            <div class="container">
                <h2 class="section-title">About TRANS COPY</h2>
                <div class="about-content">
                    <div class="about-text">
                        <p>TRANS COPY adalah mitra tepercaya untuk semua kebutuhan alat tulis Anda. Kami menawarkan berbagai macam produk berkualitas tinggi untuk membantu Anda tetap teratur dan produktif dalam kehidupan profesional Anda.</p>
                        <p>Dengan pengalaman bertahun-tahun di industri ini, kami bangga menyediakan layanan pelanggan yang sangat baik dan produk-produk terbaik dengan harga yang kompetitif.</p>
                    </div>
                    <div class="about-image">
                        <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/stationery-shoap-design-template-83c211e30cc80a8879f1a7610d7bd310_screen.jpg?ts=1637407231" alt="About TRANS COPY">
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <div class="container">
                <h2 class="section-title">Contact Us</h2>
                <div class="contact-content">
                    <div class="contact-info">
                        <h4>Get in Touch</h4>
                        <p>Have questions or need assistance? We're here to help!</p>
                        <ul>
                            <li>Email: info@transcopy.com</li>
                            <li>Phone: (+62) 813-4785-8607</li>
                            <li>Address: 123 Stationery Street, Paper City, 12345</li>
                        </ul>
                    </div>
                    <div class="contact-form">
                        <form>
                            <label for="name">Name</label>
                            <input type="text" id="name" required>
                            <label for="email">Email</label>
                            <input type="email" id="email" required>
                            <label for="message">Message</label>
                            <textarea id="message" rows="4" required></textarea>
                            <button type="submit" class="btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h5>TRANS COPY</h5>
                    <p>Your trusted stationery supplier since 2023</p>
                </div>
                <div class="footer-column">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#products">Products</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>Follow Us</h5>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>&copy; 2023 TRANS COPY. All rights reserved.</p>
            </div>
        </div>
    </footer>

 
</body>
</template>