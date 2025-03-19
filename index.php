<?php
session_start();
include 'db.php'; 
function getProducts($conn) {
    $sql = "SELECT * FROM produk"; // Query to get all products
    $result = $conn->query($sql);
    $products = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row; // Add each product to the array
        }
    }
    return $products; // Return the array of products
}

$products = getProducts($conn); // Call the function to get products
function getCategories($conn) {
    $sql = "SELECT DISTINCT kategori FROM produk"; // Adjust the query based on your table structure
    $result = $conn->query($sql);
    $categories = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[] = ucfirst($row['kategori']); // Capitalize the first letter
        }
    }
    return $categories; // Return the array of categories
}

$availableCategories = getCategories($conn); // Call the function to get categories
$conn->close(); // Close the database connection
include 'meja.php'; 
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
            <li><a href="#contact">Hubungi<br>Kami</a></li>
            
        </ul>
        <div class="cart-icon">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">0</span> <!-- This will show the number of items in the cart -->
        </div>

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
                <h2>Semua Kategori </h2><i class="fas fa-chevron-down" style="margin-left: 10px;" id="toggle-categories"></i>
            </div>
            <div class="categories-list" id="categories-list" style="display: none;">
                <ul>
                    <li class="category-item" data-category="semua">Semua Kategori</li> <!-- Add this line -->
                    <?php foreach ($availableCategories as $category): ?>
                        <li class="category-item" data-category="<?php echo htmlspecialchars($category); ?>"><?php echo htmlspecialchars($category); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="product-grid" id="product-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <div class="product-image-container">
                            <img alt="<?php echo htmlspecialchars($product['namaProduk']); ?>" class="product-image" src="<?php echo htmlspecialchars($product['gambar']); ?>"/>
                            <button class="add-button">+ TAMBAH</button>
                        </div>
                        <div class="product-info">
                            <h3 class="product-name"><?php echo htmlspecialchars($product['namaProduk']); ?></h3>
                            <p class="product-price">RM <?php echo htmlspecialchars($product['harga']); ?></p>
                        </div>
                        <p class="product-description"><?php echo htmlspecialchars($product['detail']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    
        <div class="content" id="contact">
            <h1>Contact Page</h1>
            <p>Get in touch with us.</p>
        </div>
    </div>
    <div class="cart-sidebar" id="sidebar">
        <button class="close-cart-btn">&times;</button> <!-- Close button -->
        <h2>Your Cart</h2>
        <div class="table-info">>Order Type: N/A<br>Table Selected: N/A</div>
        <div class="cart-items"></div>
        <div class="cart-total">
            <h3 class="cart-total-price">Total: RM 0.00</h3>
            <button class="checkout-btn">Checkout</button>
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
                <img alt="Placeholder image for Dine-In option" height="150" src="https://cdn-icons-png.flaticon.com/512/1659/1659463.png" width="150" />
                <button class="go-to-menu-btn" onclick="handleDineIn()">Pilih</button>
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
                <img alt="Placeholder image for Take-Away option" height="150" src="https://cdn-icons-png.flaticon.com/512/5247/5247862.png" width="150" />
                <button class="go-to-menu-btn" onclick="handleTakeAway()">Pilih</button>
                <p class="option-desc"> Grab your meal and enjoy it anywhere. </p>
            </div>
        </div>
    </div>

</body>
</html>
