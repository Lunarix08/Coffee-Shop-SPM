<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kedai Daily Grind</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <script src="script.js"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="assets/icon.webp">
            <h1>Kedai Daily<br>Grind</h1>
        </div>
        <ul>
            <li><a href="#home">Halaman<br>Utama</a></li>
            <li><a href="#about">Tentang<br>Kami</a></li>
            <li><a href="#menu">Menu<br>Kami</a></li>
            <li><a href="#contact">Hubungi<br>Kami</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="content active" id="home">
            <section class="hero">
                <div class="home-container">
                    <div class="hero-text">
                        <h1>Selamat Datang Ke<br>Kedai Daily Grind</h1>
                        <h2>The best coffee in town</h2>
                        <p>Experience the finest coffee made from the best beans around the world. Join us for a cup of joy.</p>
                        <a class="login-btn">Login</a>
                    </div>
                    <div class="hero-image">
                        <img src="https://storage.googleapis.com/a1aa/image/EQ7iDqLtGIsQS6Ms8oFTh6eoDbBncOSPwzYUvi7D9NY.jpg" alt="A steaming cup of coffee on a wooden table with coffee beans scattered around" width="600" height="400">
                    </div>
                </div>
            </section>
           
        </div>
    
        <div class="content" id="about">
            <h1>About Page</h1>
            <p>Learn more about us on this page.</p>
        </div>
    
        <div class="content" id="menu">
            <div class="banner">
                <img alt="Main banner image" class="banner-img" src="https://placehold.co/1200x250" />
            </div>
            <div class="categories-show">
                <h2>Semua Produk <i class="fas fa-chevron-down" style="margin-left: 10px;" id="toggle-categories"></i></h2>
            </div>
            <div class="categories-list" id="categories-list" style="display: none;">
                <ul>
                    <li>Kategori 1</li>
                    <li>Kategori 2</li>
                    <li>Kategori 3</li>
                    <li>Kategori 4</li>
                    <li>Kategori 5</li>
                </ul>
            </div>
            <section class="product-grid">
                <!-- Existing Product Cards -->
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 1" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 1</h3>
                        <p class="product-price">Harga Produk 1</p>
                    </div>
                    <p class="product-description">Hurian Produk 1</p>
                </div>
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 1" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 1</h3>
                        <p class="product-price">Harga Produk 1</p>
                    </div>
                    <p class="product-description">Hurian Produk 1</p>
                </div>
                <!-- New Product Cards -->
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 5" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 5</h3>
                        <p class="product-price">Harga Produk 5</p>
                    </div>
                    <p class="product-description">Hurian Produk 5</p>
                </div>
        
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 6" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 6</h3>
                        <p class="product-price">Harga Produk 6</p>
                    </div>
                    <p class="product-description">Hurian Produk 6</p>
                </div>
        
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 7" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 7</h3>
                        <p class="product-price">Harga Produk 7</p>
                    </div>
                    <p class="product-description">Hurian Produk 7</p>
                </div>
        
                <div class="product-card">
                    <div class="product-image-container">
                        <img alt="Gambar Produk 8" class="product-image" src="https://placehold.co/150x150"/>
                        <button class="add-button">+ TAMBAH</button>
                    </div>
                    <div class="product-info">
                        <h3 class="product-name">Nama Produk 8</h3>
                        <p class="product-price">Harga Produk 8</p>
                    </div>
                    <p class="product-description">Hurian Produk 8</p>
                </div>
            </section>
        </div>
    
        <div class="content" id="contact">
            <h1>Contact Page</h1>
            <p>Get in touch with us.</p>
        </div>
    </div>
    

    <div class="login-n-register-container">
        <div class="login-container" style="width: 310px;">
            <button class="close-btn">&times;</button>
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <p>E-mel:</p>
                <input name="emel" placeholder="E-mel" type="email" required />
                <p>Kata Laluan:</p>
                <input name="password" placeholder="Password" type="password" required />
                <a class="register-link" href="#">Pengguna Baharu? Daftar Sini!</a>
                <button type="submit" class="login-btn">Login</button>
            </form>
        </div>
    
        <div class="register-container" style="width: 500px;">
            <button class="close-btn">&times;</button>
            <h2>Pendaftaran</h2>
            <form action="register.php" method="POST">
                <p>Nama:</p>
                <input name="namaPelanggan" placeholder="Nama" type="text" required />
                <p>Nom H/P:</p>
                <input name="nomhp" placeholder="Phone Number" type="tel" required />
                <p>E-mel:</p>
                <input name="emel" placeholder="Email" type="email" required />
                <p>Kata Laluan:</p>
                <input name="password" placeholder="Password" type="password" required />
                <p>Semak Kata Laluan:</p>
                <input name="confirm_password" placeholder="Confirm Password" type="password" required />
                <button type="submit" class="register-btn">Daftar</button>
            </form>
        </div>
    </div>
</body>
</html>