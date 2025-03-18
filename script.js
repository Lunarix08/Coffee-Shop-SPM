document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.navbar ul li a');
    const contents = document.querySelectorAll('.content');
    const loginBtn = document.querySelector('.login-btn');
    const loginContainer = document.querySelector('.login-container');
    const registerLink = document.querySelector('.login-container .register-link');
    const registerContainer = document.querySelector('.register-container');
    const closeBtns = document.querySelectorAll('.close-btn');
    const loginLink = document.querySelector('.register-container .login-link');
    const loginRegisterContainer = document.querySelector('.login-n-register-container');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);

            contents.forEach(content => {
                content.classList.remove('active');
            });

            document.getElementById(targetId).classList.add('active');
            loginRegisterContainer.style.display = 'none'; // Hide login/register when navigating
            document.querySelector('.container').style.display = 'block'; // Show the main content container
            document.querySelector('.eating-way').style.display = 'none'; // Hide the main content container
        });
    });

    loginBtn.addEventListener('click', showLogin);
    
    registerLink.addEventListener('click', function(e) {
        e.preventDefault();
        loginContainer.style.display = 'none';
        registerContainer.style.display = 'block';
    });

    loginLink.addEventListener('click', function(e) {
        e.preventDefault();
        registerContainer.style.display = 'none';
        loginContainer.style.display = 'block';
    });

    closeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            loginContainer.style.display = 'none'; // Hide the login container
            registerContainer.style.display = 'none'; // Hide the register container
            loginRegisterContainer.style.display = 'none'; // Hide the login/register container
            document.querySelector('.container').style.display = 'block'; // Show the main content container
            document.getElementById('home').classList.add('active'); // Optionally show home content
        });
    });
});

function showLogin() {
    document.querySelector('.container').style.display = 'none'; // Hide the main content container
    document.querySelector('.register-container').style.display = 'none'; // Ensure the register container is hidden
    document.querySelector('.login-container').style.display = 'block'; // Show the login container
    document.querySelector('.login-n-register-container').style.display = 'flex'; // Show the login/register container
    document.querySelector('.eating-way').style.display = 'none'; // Hide the main content container
}

function showRegister() {
    document.querySelector('.container').style.display = 'none'; // Hide the main content container
    document.querySelector('.login-container').style.display = 'none'; // Ensure the login container is hidden
    document.querySelector('.register-container').style.display = 'block'; // Show the register container
    document.querySelector('.login-n-register-container').style.display = 'flex'; // Show the login/register container
    document.querySelector('.eating-way').style.display = 'none'; // Hide the main content container
}


document.addEventListener('DOMContentLoaded', function() {
    const toggleCategories = document.getElementById('toggle-categories');
    const categoriesList = document.getElementById('categories-list');

    toggleCategories.addEventListener('click', function() {
        // Toggle the display of the categories list
        if (categoriesList.style.display === 'none' || categoriesList.style.display === '') {
            categoriesList.style.display = 'block';
            
        } else {
            categoriesList.style.display = 'none';

        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const startOrderBtn = document.querySelector('.start-order-btn');
    const eatingWayContainer = document.querySelector('.eating-way');

    if (startOrderBtn) {
        startOrderBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Hide other content
            document.querySelector('.container').style.display = 'none';
            eatingWayContainer.style.display = 'block'; // Show the eating way container
        });
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const goToMenuButtons = document.querySelectorAll('.go-to-menu-btn');
    const eatingWayContainer = document.querySelector('.eating-way');
    const mainContainer = document.querySelector('.container');
    const menuContent = document.getElementById('menu');
    const contents = document.querySelectorAll('.content');

    

    goToMenuButtons.forEach(button => {
        button.addEventListener('click', function() {
            contents.forEach(content => {
                content.classList.remove('active');
            });
            // Hide the eating way container and show the menu
            eatingWayContainer.style.display = 'none'; // Hide the eating way section
            mainContainer.style.display = 'block'; // Show the main content container
            menuContent.classList.add('active'); // Show the menu content
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const toggleCategories = document.getElementById('toggle-categories');
    const categoriesList = document.getElementById('categories-list');
    const productGrid = document.getElementById('product-grid'); // Ensure this ID matches your HTML
    const mainTitle = document.querySelector('.categories-show h2'); // Select the main title element

    toggleCategories.addEventListener('click', function() {
        // Toggle the display of the categories list
        categoriesList.style.display = categoriesList.style.display === 'none' ? 'block' : 'none';
    });

    const categoryItems = document.querySelectorAll('.category-item'); // Ensure these items exist
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            const selectedCategory = this.getAttribute('data-category');
            fetchProducts(selectedCategory); // Fetch products for the selected category

            // Update the main title based on the selected category
            if (selectedCategory === 'semua') {
                mainTitle.innerHTML = 'Semua Kategori'; // Set title for all categories
            } else {
                mainTitle.innerHTML = selectedCategory; // Set title for the selected category
            }

            // Ensure the categories list is visible
            categoriesList.style.display = 'block'; // Always show the category list
        });
    });

    function fetchProducts(category) {
        let url = 'fetch_products.php?category=' + encodeURIComponent(category);
    
        fetch(url)
            .then(response => response.json())
            .then(products => {
                if (productGrid) {
                    productGrid.innerHTML = ''; // Clear previous products
                    products.forEach(product => {
                        const productCard = document.createElement('div');
                        productCard.classList.add('product-card');
                        productCard.innerHTML = `
                            <div class="product-image-container">
                                <img alt="${product.namaProduk}" class="product-image" src="${product.gambar}" />
                                <button class="add-button">+ TAMBAH</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-name">${product.namaProduk}</h3>
                                <p class="product-price">RM ${product.harga}</p>
                            </div>
                            <p class="product-description">${product.detail}</p>
                        `;
                        productGrid.appendChild(productCard);
                    });
                } else {
                    console.error('Product grid element not found.');
                }
            })
            .catch(error => console.error('Error fetching products:', error));
    }
    
});
document.addEventListener('DOMContentLoaded', function() {
    const toggleCategories = document.getElementById('toggle-categories');
    const categoriesList = document.getElementById('categories-list');

    toggleCategories.addEventListener('click', function() {
        // Toggle the display of the categories list
        categoriesList.style.display = categoriesList.style.display === 'none' ? 'block' : 'none';
    });

    // Close the categories list if clicking outside of it
    document.addEventListener('click', function(event) {
        if (!toggleCategories.contains(event.target) && !categoriesList.contains(event.target)) {
            categoriesList.style.display = 'none'; // Hide the categories list
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const cartIcon = document.querySelector('.cart-icon');
    const cartCount = document.querySelector('.cart-count');
    const cartSidebar = document.querySelector('.cart-sidebar');
    const cartItemsContainer = document.querySelector('.cart-items');
    const closeCartBtn = document.querySelector('.close-cart-btn');
    let cartItems = []; // Array to hold cart items

    // Function to update cart count
    function addToCart(product) {
        const existingProduct = cartItems.find(item => item.name === product.name);
        if (existingProduct) {
            existingProduct.quantity += 1; // Increase quantity if product already exists
        } else {
            cartItems.push({ ...product, quantity: 1 }); // Add new product if not in cart
        }
    
        updateCartCount(); // Update cart count display
        displayCartItems(); // Always display cart items
    
        // Show cart icon if total items > 1
        cartIcon.style.display = cartItems.length > 0 ? 'block' : 'none';
    }
    
    function updateCartCount() {
        let totalQuantity = cartItems.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalQuantity;
    
        if (totalQuantity > 0) {
            cartCount.style.display = 'flex'; // Show circle
            cartCount.classList.add('pop'); // Trigger pop animation
            setTimeout(() => cartCount.classList.remove('pop'), 300); // Remove pop after animation
        } else {
            cartCount.style.display = 'none'; // Hide when empty
        }
    }
    
    

    // Event listener for "TAMBAH" button
    const addButtons = document.querySelectorAll('.add-button');
    addButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productCard = this.closest('.product-card');
            const productName = productCard.querySelector('.product-name').textContent;
            const productPrice = productCard.querySelector('.product-price').textContent;
            const productImage = productCard.querySelector('.product-image').src; // Get product image

            // Create a product object
            const product = {
                name: productName,
                price: productPrice,
                image: productImage
            };

            addToCart(product); // Add product to cart
        });
    });

    // Event listener for cart icon click
    cartIcon.addEventListener('click', function() {
        cartSidebar.classList.toggle('active'); // Toggle sidebar visibility
        displayCartItems(); // Display cart items
    });

    function displayCartItems() {
        cartItemsContainer.innerHTML = ''; // Clear previous items
        let totalPrice = 0; // Initialize total price
    
        cartItems.forEach((item, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('cart-item');
            itemDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image" />
                <div class="cart-item-info">
                    <span class="cart-item-name">${item.name}</span>
                    <span class="cart-item-price">RM ${item.price}</span>
                    <input type="number" class="cart-item-quantity" value="${item.quantity}" min="1" data-name="${item.name}" />
                    
                </div>
                <button class="remove-item-btn" data-index="${index}">Remove</button>
            `;
            cartItemsContainer.appendChild(itemDiv);
    
            totalPrice += parseFloat(item.price.replace("RM", "").trim()) * item.quantity; // Calculate total
        });
    
        // Update total price in the existing cart-total div
        const totalDiv = document.querySelector('.cart-total h3');
        if (totalDiv) {
            totalDiv.innerHTML = `Total: RM ${totalPrice.toFixed(2)}`;
        }
    
        // Add Clear Cart button if items exist
        let clearCartBtn = document.querySelector('.clear-cart-btn');
        if (!clearCartBtn) {
            clearCartBtn = document.createElement('button');
            clearCartBtn.classList.add('clear-cart-btn');
            clearCartBtn.textContent = 'Clear Cart';
            document.querySelector('.cart-total').appendChild(clearCartBtn);
        }
    
        // Event listener for Clear Cart button
        clearCartBtn.addEventListener('click', function () {
            cartItems = []; // Empty the cart array
            displayCartItems(); // Refresh cart display
            updateCartCount(); // Update cart count to 0
        });
    
        // Event listeners for Remove Buttons
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', function () {
                const index = this.getAttribute('data-index');
                cartItems.splice(index, 1); // Remove item from array
                displayCartItems(); // Refresh cart display
                updateCartCount(); // Update cart count
            });
        });
    
        // Event listener for quantity change
        cartItemsContainer.addEventListener('change', function(event) {
            if (event.target.classList.contains('cart-item-quantity')) {
                const name = event.target.getAttribute('data-name');
                const quantity = parseInt(event.target.value);
                const item = cartItems.find(item => item.name === name);
                if (item) {
                    item.quantity = quantity; // Update quantity
                    if (item.quantity < 1) {
                        cartItems = cartItems.filter(i => i.name !== name); // Remove item if quantity < 1
                    }
                }
                displayCartItems(); // Recalculate and display total
                updateCartCount(); // Update cart count
            }
        });
    }
    
    

    // Event listener for close button
    closeCartBtn.addEventListener('click', function() {
        cartSidebar.classList.remove('active'); // Hide the sidebar
    });

    // Event listener for quantity change
    cartItemsContainer.addEventListener('change', function(event) {
        if (event.target.classList.contains('cart-item-quantity')) {
            const name = event.target.getAttribute('data-name');
            const quantity = parseInt(event.target.value);
            const item = cartItems.find(item => item.name === name);
            if (item) {
                item.quantity = quantity; // Update quantity
            }
            displayCartItems(); // Recalculate and display total
        }
    });
    
});

