const logoutLink = document.querySelector('nav ul').lastChild.lastChild;
logoutLink.addEventListener('click', async e => {
    const response = await fetch(logoutLink.href, {
        method: 'GET',
    });
    window.location.href = 'http://localhost/php-mvc/';
});