<?php
session_start();
include 'db.php'; // Include the database connection
include 'meja.php'; // Include the meja.php file to fetch available tables

// Your existing session handling code...
?>

<?php if (isset($_SESSION['login_error'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showLogin();
        });
    </script>
    <?php 
    $loginError = $_SESSION['login_error']; 
    unset($_SESSION['login_error']); 
    ?>
<?php elseif (isset($_SESSION['register_error'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showRegister();
        });
    </script>
    <?php 
    $registerError = $_SESSION['register_error']; 
    unset($_SESSION['register_error']); 
    ?>
<?php elseif (isset($_SESSION['register_success'])): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showLogin();
            
        });
    </script>
    <?php 
    $registerSuccess = $_SESSION['register_success']; 
    unset($_SESSION['register_success']); 
    ?>
<?php endif; ?>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const eatingWayContainer = document.querySelector('.eating-way');
        
        // Function to check if user is logged in
        function checkLoginStatus() {
            // Assuming you set a session variable in PHP to check login status
            const isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
            
            if (!isLoggedIn) {
                eatingWayContainer.style.display = 'none'; // Hide if not logged in
            } else {
                eatingWayContainer.style.display = 'block'; // Show if logged in
                document.querySelector('.container').style.display = 'none'; // Hide the main content container
            }
        }

        checkLoginStatus(); // Call the function on page load
    });
    function confirmLogout() {
        const confirmation = confirm("Adakah anda pasti ingin log keluar?");
        if (confirmation) {
            window.location.href = 'logout.php'; // Redirect to logout.php if confirmed
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const startOrderBtn = document.querySelector('.start-order-btn');
        const eatingWayContainer = document.querySelector('.eating-way');
        const mejaSelect = document.querySelector('#meja');

        if (startOrderBtn) {
            startOrderBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Hide other content
                document.querySelector('.container').style.display = 'none';
                eatingWayContainer.style.display = 'block'; // Show the eating way container
            });
        }

        mejaSelect.addEventListener('change', function() {
            const selectedMeja = mejaSelect.value;
            // You can perform any action with the selected table here
            console.log(`Selected table: ${selectedMeja}`);
            // For example, you could send this value to the server or update the UI accordingly
        });
    });
    </script>
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
        <?php if (isset($_SESSION['user_id'])): ?>
            <a class="logout-btn" onclick="confirmLogout()">Logout</a>
        <?php endif; ?>
    </div>
    <div class="container">
        <div class="content active" id="home">
            <section class="hero">
                <div class="home-container">
                    <div class="hero-text">
                        <h1>Selamat Datang Ke<br>Kedai Daily Grind</h1>
                        <h2>The best coffee in town</h2>
                        <p>Experience the finest coffee made from the best beans around the world. Join us for a cup of joy.</p>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a class="start-order-btn" href="#eating-way">Start Order</a>
                        <?php else: ?>
                            <a class="login-btn">Login</a>
                        <?php endif; ?>
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
                <?php if (isset($loginError)): ?>
                    <div class="error-message">
                        <p><?php echo htmlspecialchars($loginError); ?></p>
                    </div>
                <?php elseif (isset($registerSuccess)): ?>
                    <div class="error-message">
                        <p><?php echo htmlspecialchars($registerSuccess); ?></p>
                    </div>
                <?php endif; ?>
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
                <?php if (isset($registerError)): ?>
                    <div class="error-message">
                        <p><?php echo htmlspecialchars($registerError); ?></p>
                    </div>
                
                <?php endif; ?>
                <a class="login-link" href="#">Pengguna Baharu? Daftar Sini!</a>
                <button type="submit" class="register-btn">Daftar</button>
            </form>
        </div>
    </div>
    <div class="eating-way">
        <h1 class="title"> Selamat Datang, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pelanggan'; ?>! </h1>
        <h2 class="subtitle"> Pilih Cara Makan </h2>
        <div class="options">
            <div class="option">
                <h3 class="option-title"> Dine-In </h3>
                <img alt="Placeholder image for Dine-In option" height="150" src="https://storage.googleapis.com/a1aa/image/jXsSXhe7SpdviBe0-iu-KrHuxul6Jk1gNpP6X5hOGGw.jpg" width="150" />
                <p class="option-desc"> Enjoy your meal in our cozy restaurant. </p>
                <div class="select-table">
                    <label for="meja">Pilih Meja:</label>
                    <select id="meja" name="meja">
                        <?php foreach ($availableMeja as $meja) { ?>
                            <option value="<?php echo $meja['noMeja']; ?>"><?php echo $meja['info']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="option">
                <h3 class="option-title"> Take-Away </h3>
                <img alt="Placeholder image for Take-Away option" height="150" src="https://storage.googleapis.com/a1aa/image/aaclQ9-iEdZWsiRwaQlFuY3N48IHJeT4LNwTCkN2Zb8.jpg" width="150" />
                <p class="option-desc"> Grab your meal and enjoy it anywhere. </p>
                
            </div>
        </div>
        
    </div>
</body>
</html>
