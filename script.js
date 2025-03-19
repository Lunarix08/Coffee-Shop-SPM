let cartItems = []; 
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
    console.log('DOM fully loaded and parsed');

    const cartIcon = document.querySelector('.cart-icon');
    const cartCount = document.querySelector('.cart-count');
    const cartSidebar = document.querySelector('.cart-sidebar');
    const cartItemsContainer = document.querySelector('.cart-items');
    const closeCartBtn = document.querySelector('.close-cart-btn');
    const totalPriceElement = document.querySelector('.cart-total-price'); // Ensure this element exists in your HTML
    let cartItems = []; // Array to hold full cart items (with image)

    // Function to add a product to the cart
    function addToCart(product) {
        const existingProduct = cartItems.find(item => item.name === product.name);
        if (existingProduct) {
            existingProduct.quantity += 1; // Increase quantity if product already exists
        } else {
            cartItems.push({ ...product, quantity: 1 }); // Add new product if not in cart
        }

        updateCartCount(); // Update cart count display
        displayCartItems(); // Always display cart items
        updateTotalPrice(); // Update total price display

        cartIcon.style.display = cartItems.length > 0 ? 'block' : 'none';
    }

    // Function to update cart count
    function updateCartCount() {
        let totalQuantity = cartItems.reduce((total, item) => total + item.quantity, 0);
        cartCount.textContent = totalQuantity;

        if (totalQuantity > 0) {
            cartCount.style.display = 'flex'; // Show circle
        } else {
            cartCount.style.display = 'none'; // Hide when empty
        }
    }

    // Function to update total price
    function updateTotalPrice() {
        let totalPrice = 0; // Initialize total price
        cartItems.forEach(item => {
            totalPrice += item.quantity * parseFloat(item.price.replace('RM ', '')); // Calculate total price
        });
        totalPriceElement.textContent = 'Total: RM ' + totalPrice.toFixed(2); // Update total price display
    }

    // Event listener for "TAMBAH" button
    const addButtons = document.querySelectorAll('.add-button');
    if (addButtons.length === 0) {
        console.error('No add buttons found');
    } else {
        addButtons.forEach(button => {
            button.addEventListener('click', function() {
                console.log('Add button clicked'); // Log when button is clicked
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
    }

    // Function to display cart items in the cart sidebar
    function displayCartItems() {
        cartItemsContainer.innerHTML = ''; // Clear previous items

        cartItems.forEach((item, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.classList.add('cart-item');
            itemDiv.innerHTML = `
                <img src="${item.image}" alt="${item.name}" class="cart-item-image" />
                <div class="cart-item-info">
                    <span class="cart-item-name">${item.name}</span>
                    <span class="cart-item-price">${item.price}</span>
                    <input type="number" class="cart-item-quantity" value="${item.quantity}" min="1" data-name="${item.name}" />
                </div>
                <button class="remove-item-btn" data-index="${index}">Remove</button>
            `;
            cartItemsContainer.appendChild(itemDiv);

            // Add event listener to the quantity input
            const quantityInput = itemDiv.querySelector('.cart-item-quantity');
            quantityInput.addEventListener('change', function() {
                const newQuantity = parseInt(this.value);
                if (newQuantity > 0) {
                    item.quantity = newQuantity; // Update the quantity in the cartItems array
                } else {
                    // If quantity is 0 or less, remove the item from the cart
                    cartItems.splice(index, 1);
                }
                updateCartCount(); // Update cart count display
                displayCartItems(); // Refresh the displayed cart items
                updateTotalPrice(); // Update total price display
            });
        });
    }

    // Event listener for cart icon click
    cartIcon.addEventListener('click', function() {
        cartSidebar.classList.toggle('active'); // Toggle sidebar visibility
        displayCartItems(); // Display cart items
        updateTotalPrice(); // Update total price display when sidebar is opened
    });

    // Event listener for close button
    closeCartBtn.addEventListener('click', function() {
        cartSidebar.classList.remove('active'); // Hide the sidebar
    });

    // Event listener for checkout button
    const checkoutButton = document.querySelector('.checkout-btn');
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            console.log('Checkout button clicked'); // Log when checkout is clicked
            checkout(); // Call the checkout function
        });
    } else {
        console.error('Checkout button not found');
    }

    // Function to handle checkout
    function checkout() {
        const orderType = tableSelect.type; // Get the order type (Dine-In or Take Away)
        const tableSelected = tableSelect.table; // Get the selected table

        // Prepare simplified cart items for submission
        const cartItemsToSubmit = cartItems.map(item => ({
            name: item.name,
            quantity: item.quantity,
            price: item.price
        }));

        // Log cart items before checkout
        console.log('Cart items before checkout:', cartItemsToSubmit);

        // Create a form to submit the data
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'checkout.php'; // Your checkout PHP script

        // Create hidden inputs for order type, table selected, and cart items
        const orderTypeInput = document.createElement('input');
        orderTypeInput.type = 'hidden';
        orderTypeInput.name = 'orderType';
        orderTypeInput.value = orderType;
        form.appendChild(orderTypeInput);

        const tableSelectedInput = document.createElement('input');
        tableSelectedInput.type = 'hidden';
        tableSelectedInput.name = 'tableSelected';
        tableSelectedInput.value = tableSelected;
        form.appendChild(tableSelectedInput);

        const cartItemsInput = document.createElement('input');
        cartItemsInput.type = 'hidden';
        cartItemsInput.name = 'cartItems';
        cartItemsInput.value = JSON.stringify(cartItemsToSubmit); // Convert cart items to JSON
        form.appendChild(cartItemsInput);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
});

let tableSelect = {
    type: null,
    table: null
};

// Function to record an order
function recordOrder() {
    console.log('Order recorded:', tableSelect);
    // Display the selected table and order type in the cart sidebar
    const orderInfoDiv = document.querySelector('.table-info');
    if (orderInfoDiv) {
        orderInfoDiv.innerHTML = `Order Type: ${tableSelect.type ? tableSelect.type : 'N/A'}<br>Table Selected: ${tableSelect.table ? tableSelect.table : 'N/A'}`;
    }
}

// Function to handle Dine In
function handleDineIn() {
    const tableValue = document.getElementById('meja').value;
    tableSelect.type = 'Dine In';
    tableSelect.table = tableValue;
    recordOrder();
}

// Function to handle Take Away
function handleTakeAway() {
    tableSelect.type = 'Take Away';
    tableSelect.table = null; // No table value for take away
    recordOrder();
    
}
