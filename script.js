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
}

function showRegister() {
    document.querySelector('.container').style.display = 'none'; // Hide the main content container
    document.querySelector('.login-container').style.display = 'none'; // Ensure the login container is hidden
    document.querySelector('.register-container').style.display = 'block'; // Show the register container
    document.querySelector('.login-n-register-container').style.display = 'flex'; // Show the login/register container
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
