document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true
    });

    // Product data
    const products = [
        {
            name: "Buku Tulis",
            price: 12.99,
            image: "https://bosara.sultraprov.go.id/asset/foto_produk/4222.jpg",
            description: "High-quality notebook with premium paper"
        },
        {
            name: "Pulpen",
            price: 8.99,
            image: "https://ds393qgzrxwzn.cloudfront.net/resize/c500x500/cat1/img/images/0/Z1VGrWnH2J.jpg",
            description: "Smooth writing gel pens in various colors"
        },
        {
            name: "Pengahapus",
            price: 24.99,
            image: "https://e1.pxfuel.com/desktop-wallpaper/756/475/desktop-wallpaper-eraser-5.jpg",
            description: "Modern desk organizer with multiple compartments"
        },
        {
            name: "Penggaris",
            price: 15.99,
            image: "https://images.tokopedia.net/img/cache/700/VqbcmM/2021/7/30/ad55bb76-b959-40e5-91a4-38e5ff424e5b.jpg",
            description: "Professional drawing pencils for artists"
        }
    ];

    // Populate products
    const productContainer = document.querySelector('.product-container');
    products.forEach(product => {
        const productCard = `
            <div class="category-card" data-aos="fade-up">
                <img src="${product.image}" alt="${product.name}">
                <div class="offer-content">
                    <h3>${product.name}</h3>
                    <p>${product.description}</p>
                    <p class="price">$${product.price}</p>
                    <button class="offer-button">Add to Cart</button>
                </div>
            </div>
        `;
        productContainer.innerHTML += productCard;
    });

    // Mobile menu toggle
    const mobileMenu = document.querySelector('.mobile-menu');
    const navItems = document.querySelector('.nav-items');
    
    mobileMenu.addEventListener('click', () => {
        navItems.style.display = navItems.style.display === 'flex' ? 'none' : 'flex';
    });

    // Newsletter form submission
    const newsletterForm = document.querySelector('.newsletter-form');
    newsletterForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = newsletterForm.querySelector('input').value;
        if (email) {
            alert('Thank you for subscribing to our newsletter!');
            newsletterForm.reset();
        }
    });

    // Cart functionality
    let cartCount = 0;
    const cartCountElement = document.querySelector('.cart-count');

    // Event delegation for dynamically added buttons
    document.body.addEventListener('click', (e) => {
        if (e.target.classList.contains('offer-button')) {
            cartCount++;
            cartCountElement.textContent = cartCount;

            // Add animation to cart icon
            const cartIcon = document.querySelector('.cart-icon');
            cartIcon.style.transform = 'scale(1.2)';
            setTimeout(() => {
                cartIcon.style.transform = 'scale(1)';
            }, 200);
        }
    });

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Hero slider functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        slides[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
});
